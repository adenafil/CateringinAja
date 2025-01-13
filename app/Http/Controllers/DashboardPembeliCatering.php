<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\PaymentLog;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceApi;

class DashboardPembeliCatering extends Controller
{
    public function __construct()
    {
        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
    }


    public function index() {
        return response()->view('dashboard.pembeli.index');
    }

    public function profile() {
        $user = auth()->user();
        return response()->view('dashboard.pembeli.profile', compact('user'));
    }

    public function patchProfile(Request $request) {
        $user = User::findOrFail(auth()->user()->id);
        if (request()->has('avatar')) {
            $data = $request->all();
            $file = $request->file('avatar');
            $filePath = $file->store('avatars');
            $data['avatar'] = $filePath;
            $user->update($data);
            alert()->success('Success!','Profile Information Saved Successfully');
            return back();
        }
        $user->update($request->all());
        alert()->success('Success!','Profile Information Saved Successfully');
        return back();
    }

    public function catering(Request $request) {
        if (request()->has('search')) {
            $caterings = User::query()->where('role', 'penjual')
                ->where('nama_toko', 'like', '%' . $request->get('search') . '%')
                ->paginate(4);
        } else {
            $caterings = User::query()->where('role', 'penjual')->paginate(4);
        }


        return response()->view('dashboard.pembeli.catering', compact('caterings'));
    }

    public function cateringDetail(User $catering, Request $request)
    {
        if ($request->has('search')) {
            $menus = Menu::query()->where("user_id", $catering->id)->
                where('name', 'like', '%' . $request->get('search') . '%')
                ->paginate(4);
        } else {
            $menus = Menu::query()->where("user_id", $catering->id)->paginate(4);
        }

        return response()->view('dashboard.pembeli.catering-detail', compact('menus', 'catering'));
    }

    public function addToCartView(User $catering, Menu $menu)
    {
        $quantity = User::query()
            ->where('id', \auth()->user()->id)
            ->first()
            ->cartMenus()
            ->where('menu_id', $menu->id) // Filter berdasarkan menu_id
            ->first()->pivot->quantity ?? 1;

        return response()->view('dashboard.pembeli.catering-add-to-cart', compact('catering', 'menu', 'quantity'));
    }

    public function putCart(User $catering, Menu $menu, Request $request)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        $user = User::query()->where("id", \auth()->user()->id)->first();

        $user->cartMenus()->syncWithoutDetaching([$menu->id => ['quantity' => $request->get('quantity')]]);

        alert()->success('Success!','Menu Added Into Your Cart Successfully');

        return back();
    }

    public function cartView()
    {

        $carts = DB::table('carts as c')
            ->join('menus as m', 'm.id', '=', 'c.menu_id')
            ->join('users as u', 'u.id', '=', 'm.user_id')
            ->select(
                'u.id', 'u.username', 'u.name', 'u.email', 'u.role', 'u.avatar',
                'u.nama_toko', 'u.area_antar', 'u.no_handphone', 'u.no_whatsapp',
                'u.deskripsi_toko', 'u.link_google_map_embed', 'u.kisaran_harga'
            )
            ->where('c.user_id', \auth()->user()->id) // Filter berdasarkan user_id pembeli
            ->groupBy('u.id')
            ->paginate(4);

        return response()->view('dashboard.pembeli.cart', compact('carts'));
    }

    public function checkoutView($seller_id)
    {

        $results = DB::table('carts as c')
            ->select('m.name', 'm.description', 'c.quantity', DB::raw('(m.price * c.quantity) as total_price'), 'm.price', 'm.id as menu_id', 'c.id as cart_id')
            ->join('menus as m', 'm.id', '=', 'c.menu_id')
            ->join('users as u', 'u.id', '=', 'm.user_id')
            ->where('c.user_id', \auth()->user()->id)
            ->where('m.user_id', $seller_id)
            ->get();

        $total_price = 0;

        foreach ($results as $result) {
            $total_price += $result->total_price;
        }

        $user = \auth()->user();

        return response()->view('dashboard.pembeli.catering-checkout', compact('results', 'user', 'total_price'));
    }

    public function checkout(Request $request) {
        $results = json_decode($request->input('results'), true); // Decode JSON
        $total_price =  (int) ($request->input('total_price') . ".000") * 1000;
        try {
            $payment = new Payment;
            $payment->user_id = auth()->user()->id;
            $payment->external_id = (string) Str::uuid();
            $payment->amount = $total_price;
            $payment->payer_email = $request->input('payer_email');
            $payment->description = $request->input('description');
            $payment->status = 'pending';
            $createInvoice = new CreateInvoiceRequest([
                'external_id' => $payment->external_id,
                'amount' => $total_price,
                'payer_email' => $request->input('payer_email'),
                'description' => $request->input('description'),
                'invoice_duration' => 172800,
            ]);

            $apiInstance = new InvoiceApi();
            $generateInvoice = $apiInstance->createInvoice($createInvoice);
            $payment->checkout_link = $generateInvoice['invoice_url'];
            $payment->save();

            PaymentLog::create([
               'payment_id' => $payment->id,
                'status' => 'pending',
            ]);

            // Buat order
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'payment_id' => $payment->id,
                'total_amount' => $request->input('amount'),
                'status' => 'pending',
            ]);

            $carts = $results;


            // Pindahkan item dari cart ke order_details
            foreach ($carts as $cart) {
                OrderDetail::create([
                    'order_id' => $order['id'],
                    'menu_id' => $cart['menu_id'],
                    'quantity' => $cart['quantity'],
                    'price' => $request->input('amount'),
                ]);

                // Hapus item dari cart
                $cart = DB::table('carts')->where('id', $cart['cart_id'])->first();
                if ($cart) {
                    DB::table('carts')->where('id', $cart->id)->delete();
                }
            }

            return redirect($payment->checkout_link);

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function handleWebhook(Request $request)
    {
        $data = $request->all();
        $external_id = $data['external_id'];
        $status = strtolower($data['status']);
        $payment_method = $data['payment_method'];


        $payment = Payment::where('external_id', $external_id)->first();
        $payment->status = $status;
        $payment->payment_method = $payment_method;
        $payment->save();

        PaymentLog::create([
            'payment_id' => $payment->id,
            'status' => $payment->status,
        ]);

        $order = Order::query()->where('payment_id', $payment->id)->first();
        $order->status = $status;
        $order->save();

        return response()->json([
            'message' => 'Webhook received',
            'status' => $status,
            'payment_method' => $payment_method,
        ]);
    }


    public function orderView() {
        $payments = Payment::select(
            'p.external_id as order_id',
            'penjual.nama_toko',
            'p.created_at as tanggal_pemesanan',
            'p.amount as total_biaya',
            'p.payment_method',
            'p.status',
            'p.id as payment_id',
            'r.rating',
            'r.comment',
            DB::raw('SUM(od.quantity * m.price) AS total_amount')
        )
            ->from('payments as p')
            ->join('orders as o', 'o.payment_id', '=', 'p.id')
            ->join('order_details as od', 'od.order_id', '=', 'o.id')
            ->join('menus as m', 'm.id', '=', 'od.menu_id')
            ->join('users as penjual', 'penjual.id', '=', 'm.user_id')
            ->join('reviews as r', 'r.payment_id', '=', 'p.id')
            ->groupBy('p.id', 'penjual.nama_toko')
            ->paginate(10); // Sesuaikan jumlah item per halaman sesuai kebutuhan


        return response()->view('dashboard.pembeli.order-table', compact('payments'));
    }

    public function postReview(Request $request) {
        try {
            $request->validate([
                'rating' => 'required|numeric|min:1|max:5',
                'comment' => 'required',
            ]);

            Review::create($request->all());
            alert()->success('Success!','Review Added Successfully');
            return back();
        } catch (\Throwable $th) {
            alert()->error('Error!','Terjadi kesalahan saat menambahkan review');
            return back();
        }
    }

    public function orderDetailView($payment_id) {
        $logs = PaymentLog::query()->where('payment_id', $payment_id)->get();
        $menus = Menu::select('menus.id', 'menus.picture', 'menus.name', 'menus.price', 'menus.min_order', 'menus.category', 'menus.description', 'menus.status', 'menus.user_id')
            ->join('order_details as od', 'od.menu_id', '=', 'menus.id')
            ->join('orders as o', 'o.id', '=', 'od.order_id')
            ->join('payments as p', 'p.id', '=', 'o.payment_id')
            ->where('p.id', $payment_id)
            ->get();

        $review = Review::query()->where('payment_id', $payment_id)->first();

        return response()->view('dashboard.pembeli.order-detail', compact('menus', 'logs', 'review'));
    }
}
