<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect($this->redirectTo($request));
            }
        }

        return $next($request);
    }

    protected function redirectTo(Request $request): string
    {
        $user = Auth::user();

        // Kalau akses dari route admin, redirect ke dashboard admin
        if ($request->is('admin/*') || $request->is('admin')) {
            if ($user && $user->hasAnyRole(['admin', 'pengurus'])) {
                return '/admin';
            }
            // Customer nyasar ke /admin/login → tendang ke /home
            return '/home';
        }

        // Kalau akses dari route customer (/login, /register, dll)
        if ($user && $user->hasAnyRole(['admin', 'pengurus'])) {
            return '/admin'; // Admin nyasar ke /login → arahkan ke /admin
        }

        return '/home';
    }
}