<?php

use App\Http\Controllers\DashboardJasaCatering;
use App\Http\Controllers\DashboardPembeliCatering;
use App\Http\Controllers\LandingPage;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::controller(LandingPage::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/find', 'find')->name('find');
    Route::get('/about', 'about')->name('about');
});

Route::get('/dashboard', function () {
    return redirect()->route('dashboard.overview');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'seller'])->group(function () {
    Route::get('/catering/dashboard/overview', [DashboardJasaCatering::class, 'index'])->name('dashboard.overview');
    Route::get('/catering/dashboard/menu/add', [DashboardJasaCatering::class, 'addMenuView'])->name('dashboard.menu.add-menu');
    Route::post('/catering/dashboard/menu/add', [DashboardJasaCatering::class, 'postAddMenu'])->name('dashboard.menu.add-menu.post');
    Route::get('/catering/dashboard/menu/edit/{menu}', [DashboardJasaCatering::class, 'editMenuView'])->name('dashboard.menu.edit-menu');
    Route::patch('/catering/dashboard/menu/edit/{menu}', [DashboardJasaCatering::class, 'patchMenu'])->name('dashboard.menu.edit-menu.patch');
    Route::patch('/catering/dashboard/menu/{menu}', [DashboardJasaCatering::class, 'setItemAsAvailableOrUnavailable'])->name('dashboard.menu.add-menu.patch');
    Route::delete('/catering/dashboard/menu/{menu}', [DashboardJasaCatering::class, 'deleteMenu'])->name('dashboard.menu.add-menu.delete');
    Route::get('/catering/dashboard/menu', [DashboardJasaCatering::class, 'MenuView'])->name('dashboard.menu');
    Route::get('/catering/dashboard/profile', [DashboardJasaCatering::class, 'profile'])->name('dashboard.profile');
    Route::patch('/catering/dashboard/profile', [DashboardJasaCatering::class, 'postProfile'])->name('dashboard.profile.post');
    Route::get('/catering/dashboard/order', [DashboardJasaCatering::class, 'order'])->name('dashboard.order');
    Route::get('/catering/dashboard/withdrawal/form', [DashboardJasaCatering::class, 'widthdrawalForm'])->name('dashboard.widthdrawalForm.form');
    Route::get('/catering/dashboard/withdrawal/history', [DashboardJasaCatering::class, 'widthdrawalHistory'])->name('dashboard.widthdrawalHistory');
});

Route::middleware(['auth', 'buyer'])->group(function () {
    Route::get('/user/dashboard/overview', [DashboardPembeliCatering::class, 'index'])->name('dashboard.pembeli.overview');
    Route::get('/user/dashboard/profile', [DashboardPembeliCatering::class, 'profile'])->name('dashboard.pembeli.profile');
    Route::get('/user/dashboard/catering', [DashboardPembeliCatering::class, 'catering'])->name('dashboard.pembeli.catering');
    Route::get('/user/dashboard/catering/namaToko', [DashboardPembeliCatering::class, 'cateringDetail'])->name('dashboard.pembeli.catering.detailToko');
    Route::get('/user/dashboard/catering/namaToko/namaProduct', [DashboardPembeliCatering::class, 'addToCartView'])->name('dashboard.pembeli.catering.detailToko.addToCart');
    Route::get('/user/dashboard/catering/cart', [DashboardPembeliCatering::class, 'cartView'])->name('dashboard.pembeli.catering.cart');
    Route::get('/user/dashboard/catering/checkout', [DashboardPembeliCatering::class, 'checkoutView'])->name('dashboard.pembeli.catering.checkout');
    Route::get('/user/dashboard/catering/order', [DashboardPembeliCatering::class, 'orderView'])->name('dashboard.pembeli.catering.order');
    Route::get('/user/dashboard/catering/order/detail', [DashboardPembeliCatering::class, 'orderDetailView'])->name('dashboard.pembeli.catering.order.detail');
});

require __DIR__.'/auth.php';
