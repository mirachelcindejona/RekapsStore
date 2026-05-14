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

Route::get('/admin', function () {
    return view('admin/dashboard');
})->middleware('auth');

Route::get('/admin/product', function () {
    return view('admin/product');
});

Route::get('/admin/product-add', function () {
    return view('admin/product-add');
});
Route::get('/admin/product-edit', function () {
    return view('admin/product-edit');
});
Route::get('/admin/product-detail', function () {
    return view('admin/product-detail');
});
Route::get('/pengurus/cashier', function () {
    return view('pengurus/cashier');
});
Route::get('/pengurus/cashier-orders', function () {
    return view('pengurus/cashier-orders');
});
Route::get('/pengurus/cashier-recap', function () {
    return view('pengurus/cashier-recap');
});

Route::get('/admin/finance', function () {
    return view('admin/finance');
});

Route::get('/admin/promo', function () {
    return view('admin/promo');
});

Route::get('/admin/users', function () {
    return view('admin/users');
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
    '/login', [LoginController::class, 'index']
    )->name('login');
//submit user
Route::post(
    '/login', [LoginController::class, 'login']
    )->name('login.submit');
//lupa password 
Route::get(
    '/forgot-password', [ForgotPasswordController::class, 'index']
    )->name('forgot.password');

Route::post(
    '/forgot-password', [ForgotPasswordController::class, 'sendCode']
    )->name('forgot.password.send');

// verification code
Route::get(
    '/verification-code', [VerificationCodeController::class, 'index']
    )->name('verification.code');

Route::post(
    '/verification-code', [VerificationCodeController::class, 'verify']
    )->name('verification.code.verify');

// reset password
Route::get(
    '/reset-password', [ResetPasswordController::class, 'index']
    )->name('reset.password');

Route::post(
    '/reset-password', [ResetPasswordController::class, 'update']
    )->name('reset.password.update');

Route::get(
    '/register', [RegisterController::class, 'index']
    )->name('register');

Route::post(
    '/register', [RegisterController::class, 'register']
    )->name('register.submit');
