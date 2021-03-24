<?php

namespace App\Http\Middleware;

use App\Models\Mahasiswa;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IsMahasiswa
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
        // jika login sebagai mahasiswa
        if (Auth::user() && Auth::user()->level == 2) {//&& Auth::user()->flag == 0.... tambah itu jika ingin membatasi dosen yang tidak aktif
            return $next($request);
        }
        // jika login bukan sebagai admin akan diarahkan ke halaman login
        return redirect()->route('login');
        // abort(403);// blok akses dosen yang tidak aktif
    }
}
