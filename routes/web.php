<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\auth\LoginAdminController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\registerController;
use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\Auth\VerificationCodeController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\admin\auth\ForgotPasswordAdminController;
use App\Http\Controllers\admin\auth\VerificationCodeAdminController;
use App\Http\Controllers\admin\auth\ResetPasswordAdminController;
use App\Http\Controllers\Admin\PengurusController;

Route::get('/', function () {
    $products = [
        [
            "link" => "#",
            "discount" => 20,
            "image" => "assets/img/products/pinkjersey.png",
            "name" => "Jersey RPL Pink",
            "price" => "Rp120.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 10,
            "image" => "assets/img/products/workjacket.png",
            "name" => "Work Jakcet RPL",
            "price" => "Rp207.000",
            "rating" => 4.9,
            "reviews" => 49,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 30,
            "image" => "assets/img/products/skyjersey.png",
            "name" => "Jersey RPL Sky Blue",
            "price" => "Rp105.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 0,
            "image" => "assets/img/products/stiker1.png",
            "name" => "Stiker Minnix Series",
            "price" => "Rp10.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Aksesoris",
        ],
        [
            "link" => "#",
            "discount" => 0,
            "image" => "assets/img/products/stiker2.png",
            "name" => "Stiker Devoria Series",
            "price" => "Rp10.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Aksesoris",
        ],
        [
            "link" => "#",
            "discount" => 20,
            "image" => "assets/img/products/pinkjersey.png",
            "name" => "Jersey RPL Pink",
            "price" => "Rp120.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 10,
            "image" => "assets/img/products/workjacket.png",
            "name" => "Work Jakcet RPL",
            "price" => "Rp207.000",
            "rating" => 4.9,
            "reviews" => 49,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 30,
            "image" => "assets/img/products/skyjersey.png",
            "name" => "Jersey RPL Sky Blue",
            "price" => "Rp105.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 0,
            "image" => "assets/img/products/stiker1.png",
            "name" => "Stiker Minnix Series",
            "price" => "Rp10.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Aksesoris",
        ],
        [
            "link" => "#",
            "discount" => 0,
            "image" => "assets/img/products/stiker2.png",
            "name" => "Stiker Devoria Series",
            "price" => "Rp10.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Aksesoris",
        ],
        [
            "link" => "#",
            "discount" => 20,
            "image" => "assets/img/products/pinkjersey.png",
            "name" => "Jersey RPL Pink",
            "price" => "Rp120.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 10,
            "image" => "assets/img/products/workjacket.png",
            "name" => "Work Jakcet RPL",
            "price" => "Rp207.000",
            "rating" => 4.9,
            "reviews" => 49,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 30,
            "image" => "assets/img/products/skyjersey.png",
            "name" => "Jersey RPL Sky Blue",
            "price" => "Rp105.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 0,
            "image" => "assets/img/products/stiker2.png",
            "name" => "Stiker Devoria Series",
            "price" => "Rp10.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Aksesoris",
        ],
        [
            "link" => "#",
            "discount" => 0,
            "image" => "assets/img/products/stiker1.png",
            "name" => "Stiker Minnix Series",
            "price" => "Rp10.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Aksesoris",
        ],
        [
            "link" => "#",
            "discount" => 20,
            "image" => "assets/img/products/pinkjersey.png",
            "name" => "Jersey RPL Pink",
            "price" => "Rp120.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Merchandise",
        ],
    ];
    return view('index', compact('products'));
});

Route::get('/home', function () {
    $products = [
        [
            "link" => "#",
            "discount" => 20,
            "image" => "assets/img/products/pinkjersey.png",
            "name" => "Jersey RPL Pink",
            "price" => "Rp120.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 10,
            "image" => "assets/img/products/workjacket.png",
            "name" => "Work Jakcet RPL",
            "price" => "Rp207.000",
            "rating" => 4.9,
            "reviews" => 49,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 30,
            "image" => "assets/img/products/skyjersey.png",
            "name" => "Jersey RPL Sky Blue",
            "price" => "Rp105.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 0,
            "image" => "assets/img/products/stiker1.png",
            "name" => "Stiker Minnix Series",
            "price" => "Rp10.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Aksesoris",
        ],
        [
            "link" => "#",
            "discount" => 0,
            "image" => "assets/img/products/stiker2.png",
            "name" => "Stiker Devoria Series",
            "price" => "Rp10.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Aksesoris",
        ],
        [
            "link" => "#",
            "discount" => 20,
            "image" => "assets/img/products/pinkjersey.png",
            "name" => "Jersey RPL Pink",
            "price" => "Rp120.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 10,
            "image" => "assets/img/products/workjacket.png",
            "name" => "Work Jakcet RPL",
            "price" => "Rp207.000",
            "rating" => 4.9,
            "reviews" => 49,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 30,
            "image" => "assets/img/products/skyjersey.png",
            "name" => "Jersey RPL Sky Blue",
            "price" => "Rp105.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 0,
            "image" => "assets/img/products/stiker1.png",
            "name" => "Stiker Minnix Series",
            "price" => "Rp10.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Aksesoris",
        ],
        [
            "link" => "#",
            "discount" => 0,
            "image" => "assets/img/products/stiker2.png",
            "name" => "Stiker Devoria Series",
            "price" => "Rp10.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Aksesoris",
        ],
        [
            "link" => "#",
            "discount" => 20,
            "image" => "assets/img/products/pinkjersey.png",
            "name" => "Jersey RPL Pink",
            "price" => "Rp120.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 10,
            "image" => "assets/img/products/workjacket.png",
            "name" => "Work Jakcet RPL",
            "price" => "Rp207.000",
            "rating" => 4.9,
            "reviews" => 49,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 30,
            "image" => "assets/img/products/skyjersey.png",
            "name" => "Jersey RPL Sky Blue",
            "price" => "Rp105.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Merchandise",
        ],
        [
            "link" => "#",
            "discount" => 0,
            "image" => "assets/img/products/stiker2.png",
            "name" => "Stiker Devoria Series",
            "price" => "Rp10.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Aksesoris",
        ],
        [
            "link" => "#",
            "discount" => 0,
            "image" => "assets/img/products/stiker1.png",
            "name" => "Stiker Minnix Series",
            "price" => "Rp10.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Aksesoris",
        ],
        [
            "link" => "#",
            "discount" => 20,
            "image" => "assets/img/products/pinkjersey.png",
            "name" => "Jersey RPL Pink",
            "price" => "Rp120.000",
            "rating" => 4.7,
            "reviews" => 47,
            "category" => "Merchandise",
        ],
    ];
    return view('home', compact('products'));
});

//pengurus dan admin
Route::prefix('admin')
    ->middleware([
        'auth',
        'role:admin|pengurus'
    ])
    ->group(function () {

        //dashboard
        Route::get('/', function () {
            return view('admin/dashboard');
        })->name('admin.dashboard');


        Route::middleware([
            'permission:produk'
        ])->group(function () {

            Route::get('/product', function () {
                return view('admin/product');
            })->name('admin.product');

            Route::get('/product-add', function () {
                return view('admin/product-add');
            })->name('admin.product.add');

            Route::get('/product-edit', function () {
                return view('admin/product-edit');
            })->name('admin.product.edit');

            Route::get('/product-detail', function () {
                return view('admin/product-detail');
            })->name('admin.product.detail');
        });


        Route::middleware([
            'permission:pengguna'
        ])->group(function () {

            Route::get(
                '/pengurus',
                [PengurusController::class, 'index']
            )->name('admin.pengurus');

            Route::post(
                '/pengurus/store',
                [PengurusController::class, 'store']
            )->name('admin.pengurus.store');
        });

        Route::middleware([
            'permission:keuangan'
        ])->group(function () {

            Route::get('/finance', function () {
                return view('admin/finance');
            })->name('admin.finance');
        });


        Route::middleware([
            'permission:pengguna'
        ])->group(function () {

            // halaman users
            Route::get(
                '/users',
                [PengurusController::class, 'index']
            )->name('admin.users');

            // toggle status
            Route::patch(
                '/users/{user}/toggle-status',
                [PengurusController::class, 'toggleStatus']
            )->name('admin.users.toggleStatus');

            // update pengurus
            Route::put(
                '/pengurus/{user}',
                [PengurusController::class, 'update']
            )->name('admin.pengurus.update');

            // hapus pengurus
            Route::delete(
                '/pengurus/{user}',
                [PengurusController::class, 'destroy']
            )->name('admin.pengurus.destroy');
        });

        Route::middleware([
            'permission:diskon'
        ])->group(function () {

            Route::get('/promo', function () {
                return view('admin/promo');
            })->name('admin.promo');
        });
    });

//pengurus kasir
Route::prefix('pengurus')
    ->middleware([
        'auth',
        'role:admin|pengurus'
    ])
    ->group(function () {
        Route::get('/cashier', function () {
            return view('pengurus/cashier');
        })->name('pengurus.cashier');
        Route::get('/cashier-orders', function () {
            return view('pengurus/cashier-orders');
        })->name('pengurus.cashier.orders');
        Route::get('/cashier-recap', function () {
            return view('pengurus/cashier-recap');
        })->name('pengurus.cashier.recap');
    });

// Route Admin
Route::get(
    '/admin/login',
    [LoginAdminController::class, 'index']
)->name('admin.login');
//submit form
Route::post(
    '/admin/login',
    [LoginAdminController::class, 'login']
)->name('admin.login.submit');
// rote logout 
Route::post(
    '/admin/logout',
    [LoginAdminController::class, 'logout']
)->name('admin.logout');

Route::prefix('admin')->group(function () {

    // forgot password
    Route::get(
        '/forgot-password',
        [ForgotPasswordAdminController::class, 'index']
    )->name('admin.forgot.password');

    Route::post(
        '/forgot-password',
        [ForgotPasswordAdminController::class, 'sendCode']
    )->name('admin.forgot.password.send');

    // verification code
    Route::get(
        '/verification-code',
        [VerificationCodeAdminController::class, 'index']
    )->name('admin.verification.code');

    Route::post(
        '/verification-code',
        [VerificationCodeAdminController::class, 'verify']
    )->name('admin.verification.code.verify');

    // reset password
    Route::get(
        '/reset-password',
        [ResetPasswordAdminController::class, 'index']
    )->name('admin.reset.password');

    Route::post(
        '/reset-password',
        [ResetPasswordAdminController::class, 'update']
    )->name('admin.reset.password.update');
});



// Route User/Client
Route::get(
    '/login',
    [LoginController::class, 'index']
)->name('login');
//submit user
Route::post(
    '/login',
    [LoginController::class, 'login']
)->name('login.submit');
//lupa password 
Route::get(
    '/forgot-password',
    [ForgotPasswordController::class, 'index']
)->name('forgot.password');

Route::post(
    '/forgot-password',
    [ForgotPasswordController::class, 'sendCode']
)->name('forgot.password.send');

// verification code
Route::get(
    '/verification-code',
    [VerificationCodeController::class, 'index']
)->name('verification.code');

Route::post(
    '/verification-code',
    [VerificationCodeController::class, 'verify']
)->name('verification.code.verify');

// reset password
Route::get(
    '/reset-password',
    [ResetPasswordController::class, 'index']
)->name('reset.password');

Route::post(
    '/reset-password',
    [ResetPasswordController::class, 'update']
)->name('reset.password.update');

Route::get(
    '/register',
    [RegisterController::class, 'index']
)->name('register');

Route::post(
    '/register',
    [RegisterController::class, 'register']
)->name('register.submit');
