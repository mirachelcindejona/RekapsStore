<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\auth\LoginAdminController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Models\Product;
use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\Auth\VerificationCodeController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\admin\auth\ForgotPasswordAdminController;
use App\Http\Controllers\admin\auth\VerificationCodeAdminController;
use App\Http\Controllers\admin\auth\ResetPasswordAdminController;
use App\Http\Controllers\Admin\PengurusController;

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

//pengurus dan admin
Route::prefix('admin')
    ->middleware([
        'auth',
        'role:admin|pengurus'
    ])
    ->group(function () {

    Route::get('/pengurus/cashier', function () {
        return view('pengurus/cashier');
    });
    Route::get('/pengurus/cashier-orders', function () {
        return view('pengurus/cashier-orders');
    });
    Route::get('/pengurus/cashier-recap', function () {
        return view('pengurus/cashier-recap');
    });

        //dashboard
        Route::get('/', function () {
            return view('admin/dashboard');
        })->name('admin.dashboard');

        Route::middleware([
            'permission:produk'
        ])->group(function () {

            Route::resource('product', ProductController::class);
            Route::get('product/{product}', [ProductController::class, 'show']);
            Route::post('/product/{slug}/stock', [ProductController::class, 'updateStock']);
            
            Route::get('categories', [CategoryProductController::class, 'index']);
            Route::post('categories', [CategoryProductController::class, 'store']);
            Route::delete('categories/{id}', [CategoryProductController::class, 'destroy']);

            Route::get('/product-edit', function () {
                return view('admin/product-edit');
            })->name('admin.product.edit');
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