<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next)
    {
        if (Session::has('admin_logged_in')) {
            return redirect('/admin');
        }

        return $next($request);
    }
}
