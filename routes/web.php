<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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