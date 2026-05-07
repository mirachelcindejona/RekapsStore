<?php

use Illuminate\Support\Facades\Route;

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
    ],
    [
        "link" => "#",
        "discount" => 10,
        "image" => "assets/img/products/workjacket.png",
        "name" => "Work Jakcet RPL",
        "price" => "Rp207.000",
        "rating" => 4.9,
        "reviews" => 49,
    ],
    [
        "link" => "#",
        "discount" => 30,
        "image" => "assets/img/products/skyjersey.png",
        "name" => "Jersey RPL Sky Blue",
        "price" => "Rp105.000",
        "rating" => 4.7,
        "reviews" => 47,
    ],
    [
        "link" => "#",
        "discount" => 0,
        "image" => "assets/img/products/stiker1.png",
        "name" => "Stiker Minnix Series",
        "price" => "Rp10.000",
        "rating" => 4.7,
        "reviews" => 47,
    ],
    [
        "link" => "#",
        "discount" => 0,
        "image" => "assets/img/products/stiker2.png",
        "name" => "Stiker Devoria Series",
        "price" => "Rp10.000",
        "rating" => 4.7,
        "reviews" => 47,
    ],
    [
        "link" => "#",
        "discount" => 20,
        "image" => "assets/img/products/pinkjersey.png",
        "name" => "Jersey RPL Pink",
        "price" => "Rp120.000",
        "rating" => 4.7,
        "reviews" => 47,
    ],
    [
        "link" => "#",
        "discount" => 10,
        "image" => "assets/img/products/workjacket.png",
        "name" => "Work Jakcet RPL",
        "price" => "Rp207.000",
        "rating" => 4.9,
        "reviews" => 49,
    ],
    [
        "link" => "#",
        "discount" => 30,
        "image" => "assets/img/products/skyjersey.png",
        "name" => "Jersey RPL Sky Blue",
        "price" => "Rp105.000",
        "rating" => 4.7,
        "reviews" => 47,
    ],
    [
        "link" => "#",
        "discount" => 0,
        "image" => "assets/img/products/stiker1.png",
        "name" => "Stiker Minnix Series",
        "price" => "Rp10.000",
        "rating" => 4.7,
        "reviews" => 47,
    ],
    [
        "link" => "#",
        "discount" => 0,
        "image" => "assets/img/products/stiker2.png",
        "name" => "Stiker Devoria Series",
        "price" => "Rp10.000",
        "rating" => 4.7,
        "reviews" => 47,
    ],
    [
            "link" => "#",
        "discount" => 20,
        "image" => "assets/img/products/pinkjersey.png",
        "name" => "Jersey RPL Pink",
        "price" => "Rp120.000",
        "rating" => 4.7,
        "reviews" => 47,
    ],
    [
        "link" => "#",
        "discount" => 10,
        "image" => "assets/img/products/workjacket.png",
        "name" => "Work Jakcet RPL",
        "price" => "Rp207.000",
        "rating" => 4.9,
        "reviews" => 49,
    ],
    [
        "link" => "#",
        "discount" => 30,
        "image" => "assets/img/products/skyjersey.png",
        "name" => "Jersey RPL Sky Blue",
        "price" => "Rp105.000",
        "rating" => 4.7,
        "reviews" => 47,
    ],
    [
        "link" => "#",
        "discount" => 0,
        "image" => "assets/img/products/stiker2.png",
        "name" => "Stiker Devoria Series",
        "price" => "Rp10.000",
        "rating" => 4.7,
        "reviews" => 47,
    ],
    [
        "link" => "#",
        "discount" => 0,
        "image" => "assets/img/products/stiker1.png",
        "name" => "Stiker Minnix Series",
        "price" => "Rp10.000",
        "rating" => 4.7,
        "reviews" => 47,
    ],
    [
        "link" => "#",
        "discount" => 20,
        "image" => "assets/img/products/pinkjersey.png",
        "name" => "Jersey RPL Pink",
        "price" => "Rp120.000",
        "rating" => 4.7,
        "reviews" => 47,
    ],
    ];
    return view('index', compact('products'));
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('admin/dashboard');
});

Route::get('/admin/product', function () {
    return view('admin/product');
});