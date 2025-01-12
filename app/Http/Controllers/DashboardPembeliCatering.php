<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPembeliCatering extends Controller
{
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
        return response()->view('dashboard.pembeli.cart');
    }

    public function checkoutView()
    {
        return response()->view('dashboard.pembeli.catering-checkout');
    }

    public function orderView() {
        return response()->view('dashboard.pembeli.order-table');
    }

    public function orderDetailView() {
        return response()->view('dashboard.pembeli.order-detail');
    }
}
