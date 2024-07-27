<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->role;
                if ($role == 'ADMIN') {
                    return redirect('/admin');
                } elseif ($role == 'UMAT') {
                    $hashedPassword = Auth::user()->getAuthPassword();
                    if (Hash::check('12345678', $hashedPassword)) {
                        return redirect()->route('akun.umat')->withErrors('Password anda menggunakan password default. Silahkan ubah password anda.');
                    } else {
                        return redirect('/umat');
                    }
                } elseif ($role == 'PENDETA') {
                    $hashedPassword = Auth::user()->getAuthPassword();
                    if (Hash::check('12345678', $hashedPassword)) {
                        return redirect()->route('akun.pendeta')->withErrors('Password anda menggunakan password default. Silahkan ubah password anda.');
                    } else {
                        return redirect('/pendeta');
                    }
                } else {
                    return redirect('/login');
                }
            }
        }

        return $next($request);
    }
}
