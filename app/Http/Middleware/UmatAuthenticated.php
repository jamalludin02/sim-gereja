<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UmatAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'UMAT') {
            return $next($request);
        } else if (Auth::check() && Auth::user()->role == 'ADMIN') {
            return redirect()->route('admin.dashboard');
        } else if (Auth::check() && Auth::user()->role == 'PENDETA') {
            return redirect()->route('pendeta.dashboard');
        } else {
            return redirect()->route('login');
        }
    }
}
