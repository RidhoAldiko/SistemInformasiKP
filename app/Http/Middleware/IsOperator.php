<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IsOperator
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
        // jika login sebagai admin maka lanjutkan proses
        if (Auth::user() && Auth::user()->level == 0) {
            return $next($request);
        }
        // jika login bukan sebagai admin akan diarahkan ke halaman login
        return redirect()->route('login');
    }
}
