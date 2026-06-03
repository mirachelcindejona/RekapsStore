<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

// Controller Admin
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\PengurusController;
use App\Http\Controllers\Admin\Auth\LoginAdminController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordAdminController;
use App\Http\Controllers\Admin\Auth\VerificationCodeAdminController;
use App\Http\Controllers\Admin\Auth\ResetPasswordAdminController;

// Controller User
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\VerificationCodeController;
use App\Http\Controllers\Auth\ResetPasswordController;

$vouchers = [
    ["name" => "Diskon Bazaar", "desc" => "Lorem ipsum dolor sit amet", "off" => 10, "value" => "bazaar", "checked" => false, "disabled" => false],
    ["name" => "Diskon Diesnat", "desc" => "Lorem ipsum dolor sit amet", "off" => 10, "value" => "bazaar", "checked" => false, "disabled" => false],
];

// 1. PUBLIC ROUTES (Halaman Pengunjung & Pembeli)
Route::get('/', function () {
    $products = Product::with(['category', 'images', 'variants', 'reviews'])->get();
    return view('index', compact('products'));
});

Route::get('/home', function () {
    $products = Product::with(['category', 'images', 'variants', 'reviews'])->get();
    return view('home', compact('products'));
});

Route::get('/product/{slug}', function ($slug) {
    $product = Product::with(['category', 'images', 'variants', 'reviews.user'])
                ->where('slug', $slug)
                ->firstOrFail();
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


// 2. AUTENTIKASI (Hanya bisa diakses jika BELUM login / Guest)
Route::middleware('guest')->group(function () {

    // --- AUTH USER / CUSTOMER ---
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'login')->name('login.submit');
    });

    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'index')->name('register');
        Route::post('/register', 'register')->name('register.submit');
    });

    Route::controller(ForgotPasswordController::class)->group(function () {
        Route::get('/forgot-password', 'index')->name('forgot.password');
        Route::post('/forgot-password', 'sendCode')->name('forgot.password.send');
    });

    Route::controller(VerificationCodeController::class)->group(function () {
        Route::get('/verification-code', 'index')->name('verification.code');
        Route::post('/verification-code', 'verify')->name('verification.code.verify');
    });

    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('/reset-password', 'index')->name('reset.password');
        Route::post('/reset-password', 'update')->name('reset.password.update');
    });

    // --- AUTH ADMIN ---
    Route::prefix('admin')->group(function () {
        Route::controller(LoginAdminController::class)->group(function () {
            Route::get('/login', 'index')->name('admin.login');
            Route::post('/login', 'login')->name('admin.login.submit');
        });

        Route::controller(ForgotPasswordAdminController::class)->group(function () {
            Route::get('/forgot-password', 'index')->name('admin.forgot.password');
            Route::post('/forgot-password', 'sendCode')->name('admin.forgot.password.send');
        });

        Route::controller(VerificationCodeAdminController::class)->group(function () {
            Route::get('/verification-code', 'index')->name('admin.verification.code');
            Route::post('/verification-code', 'verify')->name('admin.verification.code.verify');
        });

        Route::controller(ResetPasswordAdminController::class)->group(function () {
            Route::get('/reset-password', 'index')->name('admin.reset.password');
            Route::post('/reset-password', 'update')->name('admin.reset.password.update');
        });
    });
});


// 3. SECURE AREA (Hanya bisa diakses jika SUDAH login)

Route::middleware(['auth', 'check.banned'])->group(function () {

    // LOGOUT BERSAMA
    Route::post('/admin/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');

    // PANEL ADMIN (Wajib Role Admin / Pengurus)
    Route::prefix('admin')->middleware(['role:admin|pengurus'])->group(function () {
        
        Route::get('/', function () { 
            return view('admin.dashboard'); 
        })->name('admin.dashboard');

        // Modul Produk & Kategori
        Route::middleware(['permission:produk'])->group(function () {
            // Rute Custom Stock
            Route::post('/product/{slug}/stock', [ProductController::class, 'updateStock']);
            
            Route::resource('product', ProductController::class)->parameters([
                'product' => 'slug' 
            ]);

            Route::controller(CategoryProductController::class)->group(function () {
                Route::get('categories', 'index');
                Route::post('categories', 'store');
                Route::delete('categories/{id}', 'destroy');
            });
        });

        // Modul Pengguna (Pengurus & Pembeli)
        Route::middleware(['permission:pengguna'])->group(function () {
            Route::controller(PengurusController::class)->group(function () {
                Route::get('/users', 'index')->name('admin.users');
                Route::get('/pengurus', 'index')->name('admin.pengurus');
                
                Route::post('/pengurus/store', 'store')->name('admin.pengurus.store');
                Route::put('/pengurus/{user}', 'update')->name('admin.pengurus.update');
                Route::delete('/pengurus/{user}', 'destroy')->name('admin.pengurus.destroy');
                Route::patch('/users/{user}/toggle-status', 'toggleStatus')->name('admin.users.toggleStatus');
            });
        });

        // Modul Keuangan
        Route::middleware(['permission:keuangan'])->group(function () {
            Route::get('/finance', function () { return view('admin.finance'); })->name('admin.finance');
        });

        // Modul Promo / Diskon
        Route::middleware(['permission:diskon'])->group(function () {
            Route::get('/promo', function () { return view('admin.promo'); })->name('admin.promo');
        });

        Route::middleware(['permission:laporan'])->group(function () {
            Route::get('/reports', function () { return view('admin.reports'); });
            Route::get('/report-sales', function () { return view('admin.report-sales'); });
            Route::get('/report-finance', function () { return view('admin.report-finance'); });
            Route::get('/report-stock', function () { return view('admin.report-stock'); });
            Route::get('/report-transaction', function () { return view('admin.report-transaction'); });
            Route::get('/report-review', function () { return view('admin.report-review'); });
            Route::get('/report-discount', function () { return view('admin.report-discount'); });
        });
    });

    // KASIR
    Route::prefix('pengurus')->middleware(['role:admin|pengurus'])->group(function () {
        Route::get('/cashier', function () { return view('pengurus.cashier'); })->name('pengurus.cashier');
        Route::get('/cashier-orders', function () { return view('pengurus.cashier-orders'); })->name('pengurus.cashier.orders');
        Route::get('/cashier-recap', function () { return view('pengurus.cashier-recap'); })->name('pengurus.cashier.recap');
    });

});