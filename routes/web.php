<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Models\FinanceTransactions;
use App\Models\Notification;

// Controller Admin
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\PengurusController;
use App\Http\Controllers\Admin\Auth\LoginAdminController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordAdminController;
use App\Http\Controllers\Admin\Auth\VerificationCodeAdminController;
use App\Http\Controllers\Admin\Auth\ResetPasswordAdminController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\CashierController;
use App\Http\Controllers\Admin\OrderController;

// Controller User
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\VerificationCodeController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ProfileController;


// 1. PUBLIC ROUTES
Route::get('/', function () {
    $products = Product::with(['category', 'images', 'variants', 'reviews'])->get();
    return view('index', compact('products'));
});

Route::get('/product/{slug}', function ($slug) {
    $product = Product::with(['category', 'images', 'variants', 'reviews.user'])
        ->where('slug', $slug)
        ->firstOrFail();
    return view('product-detail', compact('product'));
})->name('product-detail');


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

    // LOGOUT
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/admin/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');

    // PANEL ADMIN (Wajib Role Admin / Pengurus)
    Route::prefix('admin')->middleware(['role:admin|pengurus'])->group(function () {

        Route::middleware(['permission:dashboard'])->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        });

        // Modul Produk & Kategori
        Route::middleware(['permission:produk'])->group(function () {
            Route::post('/product/{slug}/stock', [ProductController::class, 'updateStock']);
            Route::resource('product', ProductController::class)->parameters(['product' => 'slug']);
            Route::get('/product/{slug}/edit', [ProductController::class, 'edit'])->name('product.edit');
            Route::put('/product/{slug}', [ProductController::class, 'update'])->name('product.update');
            Route::post('/product/{slug}/stock-transfer', [ProductController::class, 'transferStock']);

            Route::controller(CategoryProductController::class)->group(function () {
                Route::get('categories', 'index');
                Route::post('categories', 'store');
                Route::delete('categories/{id}', 'destroy');
            });
        });

        // Modul Pengguna
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
            Route::get('/finance', [FinanceController::class, 'index']);
            Route::post('/finance/store', [FinanceController::class, 'store']);
            Route::post('/finance/update/{id}', [FinanceController::class, 'update']);
            Route::delete('/finance/delete/{id}', [FinanceController::class, 'destroy']);
        });

        // Modul Promo / Diskon & Voucher
        Route::middleware(['permission:diskon'])->group(function () {
            Route::get('/promo', [VoucherController::class, 'index'])->name('admin.promo');

            Route::post('/discount', [DiscountController::class, 'store'])->name('admin.discount.store');
            Route::put('/discount/{discount}', [DiscountController::class, 'update'])->name('admin.discount.update');
            Route::delete('/discount/{discount}', [DiscountController::class, 'destroy'])->name('admin.discount.destroy');

            Route::post('/voucher/store', [VoucherController::class, 'store'])->name('admin.voucher.store');
            Route::put('/voucher/{voucher}', [VoucherController::class, 'update'])->name('admin.voucher.update');
            Route::delete('/voucher/{voucher}', [VoucherController::class, 'destroy'])->name('admin.voucher.destroy');
        });

        Route::middleware(['permission:laporan'])->group(function () {
            Route::get('/reports', [ReportController::class, 'index']);
            Route::get('/report-sales', [ReportController::class, 'sales'])->name('report.sales');
            Route::get('/report-sales/export', [ReportController::class, 'exportSales'])->name('report.sales.export');
            Route::get('/report-finance', [ReportController::class, 'finance']);
            Route::get('/report-finance/export', [ReportController::class, 'exportFinance']);
            Route::get('/report-stock', [ReportController::class, 'stock']);
            Route::get('/report-stock/export', [ReportController::class, 'exportStock']);
            Route::get('/report-stock-history', [ReportController::class, 'stockHistory'])->name('report.stock-history');
            Route::get('/report-stock-history/export', [ReportController::class, 'exportStockHistory'])->name('report.stock-history.export');
            Route::get('/report-transaction', fn() => view('admin.report-transaction'));
            Route::get('/report-review', fn() => view('admin.report-review'));
            Route::get('/report-discount', fn() => view('admin.report-discount'));
        });

        Route::middleware(['permission:pesanan'])->group(function () {
            Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders');
            Route::put('/orders/online/{id}/status', [OrderController::class, 'updateOnlineStatus'])->name('orders.online.status');
        });

        // Modul Kasir
        Route::middleware(['permission:kasir'])->group(function () {
            Route::get('/cashier', [CashierController::class, 'index'])->name('admin.cashier');
            Route::get('/cashier/products', [CashierController::class, 'getProducts']);
            Route::post('/cashier/cart/add', [CashierController::class, 'addToCart']);
            Route::post('/cashier/cart/update', [CashierController::class, 'updateCart']);
            Route::post('/cashier/cart/remove', [CashierController::class, 'removeFromCart']);
            Route::post('/cashier/cart/clear', [CashierController::class, 'clearCart']);
            Route::post('/cashier/checkout', [CashierController::class, 'checkout']);
            Route::get('/cashier/orders', [CashierController::class, 'orders'])->name('admin.cashier.orders');
            Route::post('/cashier/orders/pin', [CashierController::class, 'togglePinOrder']);
            Route::post('/cashier/orders/done', [CashierController::class, 'markDoneOrder']);
            Route::get('/cashier/recap', [CashierController::class, 'recap'])->name('admin.cashier.recap');
        });
    });

    // CLIENT - Khusus customer (role:customer)
    Route::middleware(['role:customer'])->group(function () {
        Route::get('/home', function () {
            $products = Product::with(['category', 'images', 'variants', 'reviews'])->get();
            return view('home', compact('products'));
        });

        Route::get('/cart', [CartController::class, 'index']);
        Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
        Route::post('/cart/update/{itemId}', [CartController::class, 'update'])->name('cart.update');
        Route::delete('/cart/remove/{itemId}', [CartController::class, 'remove'])->name('cart.remove');

        Route::post('/checkout/update-qty', function () {
            $key = request('key');
            $qty = max(1, (int) request('quantity'));
            $qtys = session('checkout_qtys', []);
            $qtys[$key] = $qty;
            session(['checkout_qtys' => $qtys]);
            return response()->json(['success' => true]);
        });

        Route::post('/checkout', function () {
            $selectedIds = request('selected_products', []);
            if (empty($selectedIds)) {
                return redirect('/cart')->with('error', 'Pilih produk terlebih dahulu.');
            }

            $cart = \App\Models\Cart::where('user_id', auth()->id())->first();
            $cartItems = $cart
                ? \App\Models\CartItem::with(['product.images', 'product.variants'])
                ->where('cart_id', $cart->id)
                ->whereIn('product_id', $selectedIds)
                ->get()
                : collect();

            $checkoutItems = $cartItems->map(fn($item) => [
                'product_id' => $item->product_id,
                'variant_id' => $item->product_variant_id,
                'quantity'   => $item->quantity,
            ])->values()->toArray();

            $checkoutQtys = [];
            foreach ($cartItems as $item) {
                $key = $item->product_id . '_' . ($item->product_variant_id ?? '0');
                $checkoutQtys[$key] = $item->quantity;
            }

            session([
                'checkout_products' => $selectedIds,
                'checkout_items'    => $checkoutItems,
                'checkout_qtys'     => $checkoutQtys,
            ]);

            return redirect('/checkout');
        });

        Route::get('/checkout', function () {
            $selectedIds = session('checkout_products', []);
            $checkoutItems = session('checkout_items', []);
            $checkoutQtys = session('checkout_qtys', []);

            if (empty($selectedIds)) return redirect('/cart');

            $products = collect($checkoutItems)->map(function ($item) use ($checkoutQtys) {
                $product = \App\Models\Product::with(['category', 'images', 'variants'])
                    ->find($item['product_id']);
                if (!$product) return null;

                $key = $item['product_id'] . '_' . ($item['variant_id'] ?? '0');
                $product = clone $product;
                $product->checkout_qty = $checkoutQtys[$key] ?? $item['quantity'] ?? 1;
                $product->checkout_variant_id = $item['variant_id'] ?? null;
                $product->checkout_item_key = $key;
                return $product;
            })->filter()->values();

            $vouchers = \App\Models\Voucher::where('status', 'Aktif')
                ->where('end_date', '>=', now())->get();

            return view('checkout', compact('products', 'vouchers'));
        });

        Route::post('/payment', function () {
            $selectedIds = session('checkout_products', []);
            if (empty($selectedIds)) return redirect('/cart');

            $products = Product::with(['images'])->whereIn('id', $selectedIds)->get();
            $total = $products->sum(fn($p) => $p->selling_price - ($p->selling_price * $p->discount / 100));
            session(['payment_total' => $total]);
            return redirect('/payment');
        });

        Route::get('/payment', function () {
            $total = session('payment_total');
            if (!$total) return redirect('/cart');
            return view('payment', compact('total'));
        });

        Route::get('/profile', [ProfileController::class, 'index']);
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/profile/notifications', [ProfileController::class, 'notifications']);
        Route::post('/profile/notifications/read', [ProfileController::class, 'markAllRead'])->name('notifications.read');
        Route::post('/notifications/read-all', function () {
            Notification::where('user_id', auth()->id())
                ->where('is_read', false)
                ->update(['is_read' => true]);
            return response()->json(['success' => true]);
        })->name('notifications.readAll');
        Route::get('/profile/orders', [ProfileController::class, 'orders']);
    });
});