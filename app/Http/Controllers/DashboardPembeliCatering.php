<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPembeliCatering extends Controller
{
    public function index() {
        return response()->view('dashboard.pembeli.index');
    }

    public function profile() {
        return response()->view('dashboard.pembeli.profile');
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
