<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Patient
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
            return redirect()->route('admin');
        }
        elseif (Auth::check() && Auth::user()->type == 2) {
            return redirect()->route('receptionist');
        }
        elseif (Auth::check() && Auth::user()->type == 3) {
            return redirect()->route('dentist');
        }
        elseif (Auth::check() && Auth::user()->type == 4) {
            // return redirect()->route('patient');
            return $next($request);
        }
        else {
            return redirect()->route('login');
        }
        // return $next($request);
    }
}
