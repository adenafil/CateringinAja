<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureSellerRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek jika user terautentikasi dan role-nya adalah penjual
        if (Auth::check() && Auth::user()->role === 'penjual') {
            return $next($request);
        }

        // Jika bukan penjual, redirect ke halaman lain atau berikan response error
        return redirect('/user/dashboard/overview');
    }
}
