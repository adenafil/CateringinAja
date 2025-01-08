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
}
