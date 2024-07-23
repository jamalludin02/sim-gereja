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
                if (Auth::check() && Auth::user()->role == 'UMAT') {
                    return redirect()->route('umat.dashboard');
                } else if (Auth::check() && Auth::user()->role == 'ADMIN') {
                    return redirect()->route('admin.dashboard');
                } else if (Auth::check() && Auth::user()->role == 'PENDETA') {
                    return redirect()->route('pendeta.dashboard');
                }
            }
        }

        return $next($request);
    }
}
