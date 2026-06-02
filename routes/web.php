<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\auth\LoginAdminController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\registerController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Models\Product;

$vouchers = [
    [
        "name" => "Diskon Bazaar",
        "desc" => "Lorem ipsum dolor sit amet",
        "off" => 10,
        "value" => "bazaar",
        "checked" => false,  
        "disabled" => false
    ],
    [
        "name" => "Diskon Diesnat",
        "desc" => "Lorem ipsum dolor sit amet",
        "off" => 10,
        "value" => "bazaar",
        "checked" => false,  
        "disabled" => false
    ],
];

Route::get('/home', function () {
    $products = Product::with(['category', 'images', 'variants', 'reviews'])->get();
    return view('home', compact('products'));
});

Route::get('/', function () {
    $products = Product::with(['category', 'images', 'variants', 'reviews'])->get();
    return view('index', compact('products'));
});

Route::get('/product/{id}', function ($id) {
    $product = Product::with(['category', 'images', 'variants', 'reviews.user'])->findOrFail($id);
    return view('product-detail', compact('product'));
})->name('product-detail');

Route::get('/cart', function () {
    $products = Product::with(['category', 'images', 'variants'])->get();
    return view('cart', compact('products'));
});

Route::get('/checkout', function() use ($vouchers) {
    $products = Product::with(['category', 'images', 'variants'])->get();
    return view('checkout', compact('products', 'vouchers'));
});

Route::get('/admin', function () {
    return view('admin/dashboard');
});


Route::prefix('admin')->group(function () {
    Route::resource('product', ProductController::class);
    Route::get('product/{product}', [ProductController::class, 'show']);
    Route::post('/product/{slug}/stock', [ProductController::class, 'updateStock']);
    
    Route::get('categories', [CategoryProductController::class, 'index']);
    Route::post('categories', [CategoryProductController::class, 'store']);
    Route::delete('categories/{id}', [CategoryProductController::class, 'destroy']);
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

Route::get('/admin/reports', function () {
    return view('admin/reports'); 

});

Route::get('/admin/report-sales', function () {
    return view('admin/report-sales'); 

});

Route::get('/admin/report-finance', function () {
    return view('admin/report-finance'); 

});

Route::get('/admin/report-stock', function () {
    return view('admin/report-stock'); 

});

Route::get('/admin/report-transaction', function () {
    return view('admin/report-transaction'); 

});

Route::get('/admin/report-review', function () {
    return view('admin/report-review'); 

});

Route::get('/admin/report-discount', function () {
    return view('admin/report-discount'); 

});

// Route Admin
Route::get('/admin/login', [LoginAdminController::class, 'index'])->name('admin.login');
//submit form
Route::post('/admin/login', [LoginAdminController::class, 'login'])->name('admin.login.submit');

// Route User/Client
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');