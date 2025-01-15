<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Menu;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class DashboardJasaCatering extends Controller
{
    public function index(): Response
    {
        $user_id = auth()->user()->id;
        $totalMenus = Menu::where('user_id', $user_id)->count();
        $totalRevenue = OrderDetail::join('menus', 'menus.id', '=', 'order_details.menu_id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('menus.user_id', 1)
            ->where('orders.status', '!=', 'Pending')
            ->sum(DB::raw('menus.price * order_details.quantity'));
        $totalOrders = OrderDetail::join('menus', 'menus.id', '=', 'order_details.menu_id')
            ->where('menus.user_id', $user_id)
            ->count();
        $totalClients = Payment::join('orders', 'orders.payment_id', '=', 'payments.id')
            ->join('order_details', 'order_details.order_id', '=', 'orders.id')
            ->join('menus', 'menus.id', '=', 'order_details.menu_id')
            ->where('menus.user_id', $user_id)
            ->distinct('payments.user_id')
            ->count('payments.user_id');
        $totalBalance = Balance::query()->where('user_id', $user_id)->first();


        return response()->view('dashboard.penjual.index', compact('totalMenus', 'totalRevenue', 'totalOrders', 'totalClients', 'totalBalance'));
    }

    public function addMenuView(): Response
    {
        return response()->view('dashboard.penjual.form-add-menu');
    }

    public function postAddMenu(request $request): RedirectResponse
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|unique:menus,name', // Pastikan nama menu unik di tabel menus
            'price' => 'required|numeric|min:0', // Pastikan harga tidak negatif
            'min_order' => 'required|numeric|min:1', // Pastikan minimal order tidak negatif atau nol
            'category' => 'required|in:Makanan,Minuman',
            'description' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Nama menu harus diisi.',
            'name.unique' => 'Nama menu sudah digunakan. Silakan gunakan nama lain.', // Pesan error untuk unique
            'price.required' => 'Harga harus diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga tidak boleh negatif.',
            'min_order.required' => 'Minimal order harus diisi.',
            'min_order.numeric' => 'Minimal order harus berupa angka.',
            'min_order.min' => 'Minimal order tidak boleh kurang dari 1.',
            'category.required' => 'Kategori harus diisi.',
            'category.in' => 'Kategori harus berupa Makanan atau Minuman.',
            'description.required' => 'Deskripsi harus diisi.',
            'picture.required' => 'Gambar harus diupload.',
            'picture.image' => 'File harus berupa gambar.',
            'picture.mimes' => 'Gambar harus berformat jpeg, png, jpg, gif, atau svg.',
            'picture.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        try {
            $data = $request->all();
            $file = $request->file('picture');
            if ($file->isValid()) {
                $filePath = $file->store('foods/pictures', 'public');
                $data['picture'] = $filePath;
            } else {
                alert()->error('Error!','Gagal mengupload gambar');
                return back()->withErrors('Gagal mengupload gambar.');
            }
            $data['user_id'] = $user->id;
            Menu::create($data);

        } catch (\Throwable $th) {
            \Log::error('Error adding menu: ' . $th->getMessage());
            alert()->error('Error!','Terjadi kesalahan saat menambahkan menu');

            return back()->withErrors('Terjadi kesalahan saat menambahkan menu.');
        }

        alert()->success('Success!','Menu Added Successfully');

        return redirect()->route('dashboard.menu');
    }

    public function editMenuView(Menu $menu): Response
    {
        return response()->view('dashboard.penjual.edit-add-menu', compact('menu'));
    }

    public function patchMenu(Request $request, Menu $menu): RedirectResponse
    {
        $request->validate([
            'name' => 'required', // Pastikan nama menu unik di tabel menus
            'price' => 'required|numeric|min:0', // Pastikan harga tidak negatif
            'min_order' => 'required|numeric|min:1', // Pastikan minimal order tidak negatif atau nol
            'category' => 'required|in:Makanan,Minuman',
            'description' => 'required',
        ], [
            'name.required' => 'Nama menu harus diisi.',
            'price.required' => 'Harga harus diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga tidak boleh negatif.',
            'min_order.required' => 'Minimal order harus diisi.',
            'min_order.numeric' => 'Minimal order harus berupa angka.',
            'min_order.min' => 'Minimal order tidak boleh kurang dari 1.',
            'category.required' => 'Kategori harus diisi.',
            'category.in' => 'Kategori harus berupa Makanan atau Minuman.',
            'description.required' => 'Deskripsi harus diisi.',
        ]);


        if ($menu->picture && request()->has('picture')) {
            try {
                $data = $request->all();
                $file = $request->file('picture');
                if ($file->isValid()) {
                    $filePath = $file->store('foods/pictures', 'public');
                    $data['picture'] = $filePath;
                } else {
                    alert()->error('Error!','Gagal mengupload gambar');
                    return back()->withErrors('Gagal mengupload gambar.')->with('success', 'Menu Updated Successfully');
                }
                $menu->update($data);
                alert()->success('Success!','Menu Updated Successfully');
                return redirect()->route('dashboard.menu');
            } catch (\Throwable $th) {
                \Log::error('Error adding menu: ' . $th->getMessage());
                alert()->error('Error!','Terjadi kesalahan saat mengedit menu');

                return back()->withErrors('Terjadi kesalahan saat mengedit menu.')->withInput();
            }

        } else {
            $menu->update($request->all());
            alert()->success('Success!','Menu Updated Successfully');
            return redirect()->route('dashboard.menu');
        }

    }

    public function MenuView(Request $request): Response
    {

        if (request()->has('search')) {
            $menus = Menu::query()
                ->where('name', 'like', '%' . $request->get('search') . '%')
                ->where('user_id', auth()->user()->id)
                ->paginate(4);

        } else {
            $menus = Menu::query()
                ->where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'asc') // Urutkan berdasarkan tanggal terbaru
                ->paginate(4);
        }

        return response()->view('dashboard.penjual.table-menu', compact('menus'));
    }

    public function setItemAsAvailableOrUnavailable(Menu $menu): RedirectResponse
    {
        if ($menu->status == 'Tersedia') {
            $menu->update(['status' => 'Tidak Tersedia']);
            alert()->success('Success!','Menu Unavailable Successfully');
        } else {
            $menu->update(['status' => 'Tersedia']);
            alert()->success('Success!','Menu Available Successfully');
        }
        return back();
    }

    public function deleteMenu(Menu $menu): RedirectResponse
    {
        $menu->delete();
        alert()->success('Success!','Menu Deleted Successfully');
        return back();
    }

    public function profile(): Response
    {
        $user = User::findOrFail(auth()->user()->id);
        return response()->view('dashboard.penjual.profile', compact('user'));
    }

    public function postProfile(request $request): RedirectResponse
    {
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

    public function order(): Response
    {
        $results = DB::table('payments as p')
            ->join('users as pembeli', 'pembeli.id', '=', 'p.user_id')
            ->join('orders as o', 'o.payment_id', '=', 'p.id')
            ->join('order_details as od', 'od.order_id', '=', 'o.id')
            ->join('menus as penjual', 'penjual.id', '=', 'od.menu_id')
            ->select(
                'p.external_id as id_order',
                'p.created_at as tanggal',
                'pembeli.username as nama_customer',
                'p.alamat',
                'p.amount',
                'p.status',
                'penjual.user_id as penjual_id'
            )
            ->where('penjual.user_id', auth()->user()->id)
            ->paginate(10);

        return response()->view('dashboard.penjual.order', compact('results'));
    }

    public function widthdrawalForm()
    {
        return response()->view('dashboard.penjual.withdrawal-form');
    }

    public function widthdrawalHistory()
    {
        return response()->view('dashboard.penjual.withdrawal-history');
    }
}
