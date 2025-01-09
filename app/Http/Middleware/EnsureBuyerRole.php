<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureBuyerRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek jika user terautentikasi dan role-nya adalah pembeli
        if (Auth::check() && Auth::user()->role === 'pembeli') {
            return $next($request);
        }

        // Jika bukan pembeli, redirect ke halaman lain atau berikan response error
        return redirect('/catering/dashboard/overview');
    }
}
