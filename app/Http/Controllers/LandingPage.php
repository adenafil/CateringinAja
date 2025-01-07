<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LandingPage extends Controller
{
    public function index(): Response
    {
        return response()->view('landingpage.index');
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
