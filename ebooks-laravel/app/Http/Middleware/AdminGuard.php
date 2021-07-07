<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminGuard
{
    public function handle($request, Closure $next)
    {
        if(Auth::guard('admin')->check())
        {
            return $next($request);
        }

        return redirect(route('admin.loginForm'));
    }
}
