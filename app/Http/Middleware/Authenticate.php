<?php

namespace App\Http\Middleware;

use Closure;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect('/login-admin');
        }

        return $next($request);
    }
}
