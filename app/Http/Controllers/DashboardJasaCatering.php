<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
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
        return response()->view('dashboard.penjual.order');
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
