<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah session admin tersedia
        if (!Session::has('admin_logged_in')) {
            return redirect('/login-admin');
        }

        return $next($request);
    }
}
