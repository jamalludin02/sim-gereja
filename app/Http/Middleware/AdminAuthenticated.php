<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'ADMIN') {
            return $next($request);
        }
        if (Auth::check() && Auth::user()->role == 'PENDETA') {
            // dd(route('pendeta.dashboard'));
            // return $next($request);
            return redirect()->route('pendeta.dashboard');
        }
        if (Auth::check() && Auth::user()->role == 'UMAT') {
            // return $next($request);
            return redirect()->route('umat.dashboard');
        }
        return redirect()->route('login');
    }
}
