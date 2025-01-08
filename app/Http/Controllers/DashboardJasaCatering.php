<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardJasaCatering extends Controller
{
    public function index(): Response
    {
        return response()->view('dashboard.penjual.index');
    }

    public function addMenuView(): Response
    {
        return response()->view('dashboard.penjual.form-add-menu');
    }

    public function MenuView(): Response
    {
        return response()->view('dashboard.penjual.table-menu');
    }

    public function profile(): Response
    {
        return response()->view('dashboard.penjual.profile');
    }
}
