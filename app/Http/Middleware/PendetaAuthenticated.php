<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class PendetaAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'PENDETA') {
            $hashedPassword = Auth::user()->getAuthPassword();
            if (Hash::check('12345678', $hashedPassword)) {
                return redirect()->route('akun.umat')->withErrors('Password anda menggunakan password default. Silahkan ubah password anda.');
            } else {
                return $next($request);
            }
        } else if (Auth::check() && Auth::user()->role == 'UMAT') {
            return redirect()->route('umat.dashboard');
        } else if (Auth::check() && Auth::user()->role == 'ADMIN') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login');
        }
    }
}
