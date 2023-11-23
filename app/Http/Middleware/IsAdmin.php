<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        // Admin role = 1, user role = 0
        if (Auth::check()) {
            if (Auth::user()->role == 1) {
                return $next($request);
            } else {
                return redirect('/dashboard')->with('message', 'Access Denied as you are not an Admin!');
            }
        } else {
            return redirect('/login')->with('message', 'Please log in to access this page.');
        }
    }
}
