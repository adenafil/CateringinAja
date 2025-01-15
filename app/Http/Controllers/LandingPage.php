<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LandingPage extends Controller
{
    public function index(Request $request): Response
    {
        if ($request->has('search')) {
            $users = User::query()->where('role','penjual')
                ->where('nama_toko', 'like', '%' . $request->get('search') . '%')
                    ->paginate(3);
        } else {
            $users = User::query()
                ->where('role', 'penjual')
                ->take(3)
                ->get();
        }


        return response()->view('landingpage.index', compact('users'));
    }

    public function find(Request $request): Response
    {
        if ($request->has('search')) {
            $users = User::query()->where('role','penjual')
                ->where('nama_toko', 'like', '%' . $request->get('search') . '%')
                ->paginate(3);
        } else {
            $users = User::query()
                ->where('role', 'penjual')
                ->take(3)
                ->paginate();
        }
        return response()->view('landingpage.list', compact('users'));
    }

    public function about(User $user): Response
    {
        $reviews = Review::select('pembeli.avatar', 'reviews.comment', 'reviews.rating', 'pembeli.username')
            ->join('payments', 'payments.id', '=', 'reviews.id')
            ->join('orders', 'orders.payment_id', '=', 'payments.id')
            ->join('order_details', 'order_details.order_id', '=', 'orders.id')
            ->join('menus', 'menus.id', '=', 'order_details.menu_id')
            ->join('users as pembeli', 'pembeli.id', '=', 'payments.user_id')
            ->where('menus.user_id', $user->id)
            ->groupBy('order_details.order_id')
            ->get();

        return response()->view('landingpage.about', compact('user', 'reviews'));
    }
}
