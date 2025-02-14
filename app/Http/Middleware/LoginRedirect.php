<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() && $request->path() !== 'login' && $request->path() !== 'register') {
            // Arahkan ke halaman login
            return redirect('/login');
        }

        // Jika sudah login atau sedang mengakses halaman login, lanjutkan request
        return $next($request);
    }
}
