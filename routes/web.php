<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\auth\LoginAdminController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\registerController;

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
});

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

Route::get('/admin/promo', function () {
    return view('admin/promo'); 
});

Route::get('/admin/users', function () {
    return view('admin/users'); 

});

// Route Admin
Route::get('/admin/login', [LoginAdminController::class, 'index'])->name('admin.login');
//submit form
Route::post('/admin/login', [LoginAdminController::class, 'login'])->name('admin.login.submit');

// Route User/Client
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');