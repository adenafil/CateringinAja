<?php

use App\Http\Controllers\DashboardJasaCatering;
use App\Http\Controllers\DashboardPembeliCatering;
use App\Http\Controllers\LandingPage;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::controller(LandingPage::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/find', 'find');
    Route::get('/about', 'about');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/catering/dashboard/overview', [DashboardJasaCatering::class, 'index'])->name('dashboard.overview');
    Route::get('/catering/dashboard/menu/add', [DashboardJasaCatering::class, 'addMenuView'])->name('dashboard.menu.add-menu');
    Route::get('/catering/dashboard/menu', [DashboardJasaCatering::class, 'MenuView'])->name('dashboard.menu');
    Route::get('/catering/dashboard/profile', [DashboardJasaCatering::class, 'profile'])->name('dashboard.profile');
    Route::get('/catering/dashboard/order', [DashboardJasaCatering::class, 'order'])->name('dashboard.order');
    Route::get('/catering/dashboard/withdrawal/form', [DashboardJasaCatering::class, 'widthdrawalForm'])->name('dashboard.widthdrawalForm.form');
    Route::get('/catering/dashboard/withdrawal/history', [DashboardJasaCatering::class, 'widthdrawalHistory'])->name('dashboard.widthdrawalHistory');

    Route::get('/user/dashboard/overview', [DashboardPembeliCatering::class, 'index'])->name('dashboard.pembeli.overview');

//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
