<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LandingPage extends Controller
{
    public function index(): Response
    {
        $users = User::query()
            ->where('role', 'penjual')
            ->take(3)
            ->get();

        return response()->view('landingpage.index', compact('users'));
    }

    public function find(): Response
    {
        return response()->view('landingpage.list');
    }

    public function about(): Response
    {
        return response()->view('landingpage.about');
    }
}
