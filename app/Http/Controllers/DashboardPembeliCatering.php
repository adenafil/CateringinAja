<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    public function catering() {
        return response()->view('dashboard.pembeli.catering');
    }

    public function cateringDetail()
    {
        return response()->view('dashboard.pembeli.catering-detail');
    }

    public function addToCartView()
    {
        return response()->view('dashboard.pembeli.catering-add-to-cart');
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
