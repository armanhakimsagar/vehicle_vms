<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if(Auth::guard('admin')->check()){
            return route('admin.dashboard');
        }
        if(Auth::guard('dealer')->check()){
            return route('dealer.dashboard');
        }
        if(Auth::guard('enduser')->check()){
            return route('enduser.dashboard');
        }

        if (!$request->expectsJson()) {
            if(Auth::guard('dealer')->check()){
                return route('login');
            }
            else if(Auth::guard('enduser')->check()){
                return route('login');
            }
            else {
                return route('login');
            }
            
        }
    }

}
