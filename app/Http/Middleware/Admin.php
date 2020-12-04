<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Admin
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
        if (Auth::check() && Auth::user()->type == 1) {
            // return redirect()->route('admin');
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->type == 2) {
            return redirect()->route('receptionist');
        }
        elseif (Auth::check() && Auth::user()->type == 3) {
            return redirect()->route('dentist');
        }
        elseif (Auth::check() && Auth::user()->type == 4) {
            return redirect()->route('patient');
        }
        else {
            return redirect()->route('login');
        }
        // return $next($request);
    }
}
