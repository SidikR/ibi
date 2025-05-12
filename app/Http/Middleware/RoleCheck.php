<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Cek apakah pengguna sudah login
        if (!Auth::check()) {
            // Jika belum login, arahkan ke halaman login
            return redirect()->route('login')->with('status', 'Please login to access this page.');
        }

        // Jika sudah login, periksa apakah pengguna memiliki peran yang sesuai
        foreach ($roles as $role) {
            if (Auth::user()->role->name == $role) {
                return $next($request); // Peran cocok, lanjutkan request
            }
        }

        // Jika peran tidak cocok, kirimkan respon 403 Forbidden
        return abort(403, 'You are forbidden from accessing this page.');
    }
}
