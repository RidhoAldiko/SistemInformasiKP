<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->level == 0) { return redirect('/operator'); }
        else if (Auth::guard($guard)->check() && Auth::user()->level == 1) { return redirect('/dosen'); }
        else if (Auth::guard($guard)->check() && Auth::user()->level == 2) { return redirect('/mahasiswa'); }
        else{ return $next($request); }

    }
}
