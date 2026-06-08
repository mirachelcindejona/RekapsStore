<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'guest'              => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'role'               => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission'         => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            'check.banned'       => \App\Http\Middleware\CheckBannedUser::class,
        ]);

        $middleware->trustProxies(at: '*');

        $middleware->validateCsrfTokens(except: [
            '/midtrans-callback',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        $handler = function ($e, \Illuminate\Http\Request $request) {
            $user = \Illuminate\Support\Facades\Auth::user();

            if ($user && $user->hasAnyRole(['admin', 'pengurus'])) {
                $permissionRedirectMap = [
                    'dashboard' => '/admin',
                    'kasir'     => '/admin/cashier',
                    'produk'    => '/admin/product',
                    'pengguna'  => '/admin/users',
                    'keuangan'  => '/admin/finance',
                    'diskon'    => '/admin/promo',
                    'laporan'   => '/admin/reports',
                    'pesanan'   => '/admin/orders',
                ];

                foreach ($permissionRedirectMap as $permission => $url) {
                    if ($user->can($permission)) {
                        return redirect($url)->with(
                            'error_access',
                            'Kamu tidak memiliki akses ke halaman tersebut.'
                        );
                    }
                }

                return redirect('/admin')->with(
                    'error_access',
                    'Kamu tidak memiliki akses ke halaman tersebut.'
                );
            }

            return redirect('/home')->with(
                'error_access',
                'Kamu tidak memiliki akses ke halaman tersebut.'
            );
        };

        $exceptions->render(function (
            \Spatie\Permission\Exceptions\UnauthorizedException $e,
            \Illuminate\Http\Request $request
        ) use ($handler) {
            return $handler($e, $request);
        });

        $exceptions->render(function (
            \Illuminate\Auth\Access\AuthorizationException $e,
            \Illuminate\Http\Request $request
        ) use ($handler) {
            return $handler($e, $request);
        });

    })->create();