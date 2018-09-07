<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() == null)
        {
            return redirect('/login')->with('status','If you are an admin, log in');
        }

        else if(!Auth::user()->has_user_type('admin'))
        {
            return redirect('/home')->with('status', 'You shall not pass!');
        }

        return $next($request);
    }
}