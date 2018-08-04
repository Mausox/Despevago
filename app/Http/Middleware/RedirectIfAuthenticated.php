<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check())
        {
            if ($request->user()->isAdmin())
            {
                return redirect()->route('dashboardAdmin');
            }
            else if($request->user()->isConsumer())
            {
                return redirect()->route('dashboardConsumer');
            }
            else
            {
                return redirect()->route('home');
            }
        }

        return $next($request);
    }
}
