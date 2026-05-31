<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\auth\LoginAdminController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\registerController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Admin\CategoryProductController;

$products = [
    [
        "id" => 1,
        "discount" => 20,
        "image" => "assets/img/products/pinkjersey.png",
        "name" => "Jersey RPL Pink",
        "price" => 150000,
        "rating" => 4.7,
        "reviews" => 47,
        "category" => "Merchandise",
        "details" => "Jersey RPL Pink merupakan salah satu produk apparel unggulan yang dirancang khusus untuk mahasiswa dan komunitas Rekayasa Perangkat Lunak (RPL). Jersey ini memiliki desain modern dengan warna pink yang mencolok dan nyaman digunakan untuk kegiatan sehari-hari maupun event kampus.\n\nSpesifikasi Produk\n- Bahan: Dryfit Premium\n- Metode Cetak: Full Printing Sublimasi\n- Fit: Regular Fit\n- Ukuran: S, M, L, XL, XXL\n\nFitur Unggulan\n- Nyaman dipakai\n- Cepat kering\n- Warna tidak mudah luntur"
    ],

    [
        "id" => 2,
        "discount" => 10,
        "image" => "assets/img/products/workjacket.png",
        "name" => "Work Jakcet RPL",
        "price" => 230000,
        "rating" => 4.9,
        "reviews" => 49,
        "category" => "Merchandise",
        "details" => "Work Jacket RPL hadir dengan desain casual modern yang cocok digunakan untuk kegiatan kampus maupun sehari-hari. Menggunakan bahan berkualitas yang nyaman dan hangat saat digunakan.\n\nSpesifikasi Produk\n- Bahan: Cotton Twill Premium\n- Fit: Regular Fit\n- Ukuran: M, L, XL, XXL\n\nFitur Unggulan\n- Jahitan kuat dan rapi\n- Nyaman digunakan\n- Cocok untuk outdoor dan indoor"
    ],

    [
        "id" => 3,
        "discount" => 30,
        "image" => "assets/img/products/skyjersey.png",
        "name" => "Jersey RPL Sky Blue",
        "price" => 150000,
        "rating" => 4.7,
        "reviews" => 47,
        "category" => "Merchandise",
        "details" => "Jersey RPL Sky Blue memiliki desain sporty dengan dominasi warna biru langit yang elegan. Cocok digunakan untuk komunitas, olahraga, maupun kegiatan kampus.\n\nSpesifikasi Produk\n- Bahan: Dryfit Premium\n- Printing: Sublimasi Full Print\n- Ukuran: S, M, L, XL, XXL\n\nFitur Unggulan\n- Adem dan ringan\n- Desain modern\n- Warna tahan lama"
    ],

    [
        "id" => 4,
        "discount" => 0,
        "image" => "assets/img/products/stiker1.png",
        "name" => "Stiker Minnix Series",
        "price" => 10000,
        "rating" => 4.7,
        "reviews" => 47,
        "category" => "Aksesoris",
        "details" => "Stiker Minnix Series merupakan stiker karakter eksklusif dengan desain lucu dan unik. Cocok ditempel pada laptop, botol minum, motor, maupun gadget.\n\nSpesifikasi Produk\n- Material: Vinyl Waterproof\n- Finishing: Glossy\n- Ukuran: 5 - 8 cm\n\nFitur Unggulan\n- Tahan air\n- Warna tajam\n- Lem kuat dan awet"
    ],

    [
        "id" => 5,
        "discount" => 0,
        "image" => "assets/img/products/stiker2.png",
        "name" => "Stiker Devoria Series",
        "price" => 10000,
        "rating" => 4.7,
        "reviews" => 47,
        "category" => "Aksesoris",
        "details" => "Stiker Devoria Series hadir dengan desain aesthetic dan modern untuk mempercantik barang favoritmu.\n\nSpesifikasi Produk\n- Material: Vinyl Premium\n- Finishing: Matte\n- Ukuran: 5 - 8 cm\n\nFitur Unggulan\n- Waterproof\n- Tidak mudah sobek\n- Desain eksklusif"
    ],

    [
        "id" => 6,
        "discount" => 20,
        "image" => "assets/img/products/pinkjersey.png",
        "name" => "Jersey RPL Pink",
        "price" => 150000,
        "rating" => 4.7,
        "reviews" => 47,
        "category" => "Merchandise",
        "details" => "Jersey RPL Pink merupakan salah satu produk apparel unggulan yang dirancang khusus untuk mahasiswa dan komunitas Rekayasa Perangkat Lunak (RPL). Jersey ini memiliki desain modern dengan warna pink yang mencolok dan nyaman digunakan untuk kegiatan sehari-hari maupun event kampus.\n\nSpesifikasi Produk\n- Bahan: Dryfit Premium\n- Metode Cetak: Full Printing Sublimasi\n- Fit: Regular Fit\n- Ukuran: S, M, L, XL, XXL\n\nFitur Unggulan\n- Nyaman dipakai\n- Cepat kering\n- Warna tidak mudah luntur"
    ],

    [
        "id" => 7,
        "discount" => 10,
        "image" => "assets/img/products/workjacket.png",
        "name" => "Work Jakcet RPL",
        "price" => 230000,
        "rating" => 4.9,
        "reviews" => 49,
        "category" => "Merchandise",
        "details" => "Work Jacket RPL hadir dengan desain casual modern yang cocok digunakan untuk kegiatan kampus maupun sehari-hari. Menggunakan bahan berkualitas yang nyaman dan hangat saat digunakan.\n\nSpesifikasi Produk\n- Bahan: Cotton Twill Premium\n- Fit: Regular Fit\n- Ukuran: M, L, XL, XXL\n\nFitur Unggulan\n- Jahitan kuat dan rapi\n- Nyaman digunakan\n- Cocok untuk outdoor dan indoor"
    ],

    [
        "id" => 8,
        "discount" => 30,
        "image" => "assets/img/products/skyjersey.png",
        "name" => "Jersey RPL Sky Blue",
        "price" => 150000,
        "rating" => 4.7,
        "reviews" => 47,
        "category" => "Merchandise",
        "details" => "Jersey RPL Sky Blue memiliki desain sporty dengan dominasi warna biru langit yang elegan. Cocok digunakan untuk komunitas, olahraga, maupun kegiatan kampus.\n\nSpesifikasi Produk\n- Bahan: Dryfit Premium\n- Printing: Sublimasi Full Print\n- Ukuran: S, M, L, XL, XXL\n\nFitur Unggulan\n- Adem dan ringan\n- Desain modern\n- Warna tahan lama"
    ],
];

Route::get('/', function () use ($products) {
    return view('index', compact('products'));
});

Route::get('/home', function () use ($products) {
    return view('home', compact('products'));
});

Route::get('/product/{id}', function ($id) use ($products) {
    $product = collect($products)->firstWhere('id', $id);
    if (!$product) {
        abort(404);
    }
    return view('product-detail', compact('product'));
})->name('product-detail');

Route::get('/admin', function () {
    return view('admin/dashboard');
});


Route::prefix('admin')->group(function () {
    Route::resource('product', ProductController::class);
    
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

// Route Admin
Route::get('/admin/login', [LoginAdminController::class, 'index'])->name('admin.login');
//submit form
Route::post('/admin/login', [LoginAdminController::class, 'login'])->name('admin.login.submit');

// Route User/Client
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');