<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Exports\FinanceExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\FinanceTransactions;

// Controller Admin
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\PengurusController;
use App\Http\Controllers\Admin\Auth\LoginAdminController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordAdminController;
use App\Http\Controllers\Admin\Auth\VerificationCodeAdminController;
use App\Http\Controllers\Admin\Auth\ResetPasswordAdminController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\CashierController;

// Controller User
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\VerificationCodeController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Client\CartController;


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
        
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Modul Produk & Kategori
        Route::middleware(['permission:produk'])->group(function () {
            // Rute Custom Stock
            Route::post('/product/{slug}/stock', [ProductController::class, 'updateStock']);
            
            Route::resource('product', ProductController::class)->parameters([
                'product' => 'slug' 
            ]);

            Route::get('/product/{slug}/edit', [ProductController::class, 'edit'])->name('product.edit');

            Route::put('/product/{slug}', [ProductController::class, 'update'])->name('product.update');

            Route::controller(CategoryProductController::class)->group(function () {
                Route::get('categories', 'index');
                Route::post('categories', 'store');
                Route::delete('categories/{id}', 'destroy');
            });

            Route::post('/product/{slug}/stock-transfer', [ProductController::class, 'transferStock']);
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
            // Route::get('/finance', function () { return view('admin.finance'); })->name('admin.finance');
            
            Route::get(
                '/finance',
                [FinanceController::class, 'index']
            );

            Route::post(
                '/finance/store',
                [FinanceController::class, 'store']
            );

            Route::post(
                '/finance/update/{id}',
                [FinanceController::class, 'update']
            );

            Route::delete(
                '/finance/delete/{id}',
                [FinanceController::class, 'destroy']
            );
        });

        Route::middleware(['permission:laporan'])->group(function () {
            Route::get(
                '/reports',
                [ReportController::class, 'index']
            );

            Route::get(
                '/report-sales',
                [ReportController::class, 'sales']
            )->name('report.sales');

            Route::get(
                '/report-sales/export',
                [ReportController::class, 'exportSales']
            )->name('report.sales.export');
                        
            Route::get(
                '/report-finance',
                [ReportController::class, 'finance']
            );

            Route::get(
                '/report-finance/export',
                [ReportController::class, 'exportFinance']
            );

            Route::get(
                '/report-stock',
                [ReportController::class, 'stock']
            );
            Route::get(
                '/report-stock/export',
                [ReportController::class, 'exportStock']
            );

            Route::get(
                '/report-stock-history',
                [ReportController::class, 'stockHistory']
            )->name('report.stock-history');

            Route::get(
                '/report-stock-history/export',
                [ReportController::class, 'exportStockHistory']
            )->name('report.stock-history.export');

        });

        // Modul Promo / Diskon
        Route::middleware(['permission:diskon'])->group(function () {
            Route::get('/promo', function () { return view('admin.promo'); })->name('admin.promo');
        });

        Route::middleware(['permission:kasir'])->group(function () {
            Route::get('/cashier', function () { return view('admin.cashier'); })->name('admin.cashier');
            Route::get('/cashier-orders', function () { return view('admin.cashier-orders'); })->name('admin.cashier.orders');
            Route::get('/cashier-recap', function () { return view('admin.cashier-recap'); })->name('admin.cashier.recap');

            Route::get('/cashier', [CashierController::class, 'index'])->name('admin.cashier');
            Route::get('/cashier/products', [CashierController::class, 'getProducts']);
            
            // Manajemen Keranjang (Session-Based POS)
            Route::post('/cashier/cart/add', [CashierController::class, 'addToCart']);
            Route::post('/cashier/cart/update', [CashierController::class, 'updateCart']);
            Route::post('/cashier/cart/remove', [CashierController::class, 'removeFromCart']);
            Route::post('/cashier/cart/clear', [CashierController::class, 'clearCart']);
            
            // Proses Pembayaran & Transaksi
            Route::post('/cashier/checkout', [CashierController::class, 'checkout']);
        });
    });

    // CLIENT - Cart, Checkout, Payment
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{itemId}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{itemId}', [CartController::class, 'remove'])->name('cart.remove');

    Route::post('/checkout/update-qty', function () {
        $productId = request('product_id');
        $qty = max(1, (int) request('quantity'));

        $qtys = session('checkout_qtys', []);
        $qtys[$productId] = $qty;
        session(['checkout_qtys' => $qtys]);

        return response()->json(['success' => true]);
    });

    Route::post('/checkout', function () {
        $selectedIds = request('selected_products', []);
        if (empty($selectedIds)) {
            return redirect('/cart')->with('error', 'Pilih produk terlebih dahulu.');
        }

        $cart = \App\Models\Cart::where('user_id', auth()->id())->first();
        $cartItems = $cart ? $cart->items->whereIn('product_id', $selectedIds) : collect();

        $checkoutItems = $cartItems->map(fn($item) => [
            'product_id' => $item->product_id,
            'variant_id' => $item->product_variant_id,
            'quantity'   => $item->quantity,
        ])->values()->toArray();

        // checkout_qtys diisi dari qty cart sebagai nilai awal
        $checkoutQtys = $cartItems->mapWithKeys(fn($item) => [
            $item->product_id => $item->quantity,
        ])->toArray();

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

        if (empty($selectedIds)) {
            return redirect('/cart');
        }

        $products = Product::with(['category', 'images', 'variants'])
            ->whereIn('id', $selectedIds)
            ->get()
            ->map(function ($product) use ($checkoutItems, $checkoutQtys) {
                $item = collect($checkoutItems)->firstWhere('product_id', $product->id);
                // checkout_qtys lebih prioritas karena itu hasil update dari halaman checkout
                $product->checkout_qty = $checkoutQtys[$product->id] ?? $item['quantity'] ?? 1;
                $product->checkout_variant_id = $item['variant_id'] ?? null;
                return $product;
            });

        $vouchers = Voucher::where('status', 'Aktif')
            ->where('end_date', '>=', now())
            ->get();

        return view('checkout', compact('products', 'vouchers'));
    });

    Route::post('/payment', function () {
        $selectedIds = session('checkout_products', []);
        if (empty($selectedIds)) {
            return redirect('/cart');
        }
        $products = Product::with(['images'])
            ->whereIn('id', $selectedIds)
            ->get();
        $total = $products->sum(fn($p) => $p->selling_price - ($p->selling_price * $p->discount / 100));
        session(['payment_total' => $total]);
        return redirect('/payment');
    });

    Route::get('/payment', function () {
        $total = session('payment_total');
        if (!$total) {
            return redirect('/cart');
        }
        return view('payment', compact('total'));
    });

    Route::get('/history', function () {
        return view('history');
    });

});

// Route::get('/admin/report-finance', function () {

//     $query = FinanceTransactions::query();

//     if (request('search')) {
//         $query->where(
//             'description',
//             'like',
//             '%' . request('search') . '%'
//         );
//     }

//     if (request('from_date')) {
//         $query->whereDate(
//             'date',
//             '>=',
//             request('from_date')
//         );
//     }

//     if (request('to_date')) {
//         $query->whereDate(
//             'date',
//             '<=',
//             request('to_date')
//         );
//     }

//     $transactions = $query
//         ->latest()
//         ->get();

//     $totalIncome = (clone $query)
//         ->where('type', 'Pemasukan')
//         ->sum('amount');

//     $totalExpense = (clone $query)
//         ->where('type', 'Pengeluaran')
//         ->sum('amount');

//     $balance = $totalIncome - $totalExpense;

//     $totalTransactions = $transactions->count();

//     return view(
//         'admin.report-finance',
//         compact(
//             'transactions',
//             'totalIncome',
//             'totalExpense',
//             'balance',
//             'totalTransactions'
//         )
//     );

// });

// Route::get('/admin/report-finance/export', function () {

//     return Excel::download(
//         new FinanceExport,
//         'laporan-keuangan.xlsx'
//     );

// });

// Route::get('/admin/report-stock', function () {
//     return view('admin/report-stock'); 

// });

// Route::get('/admin/report-transaction', function () {
//     return view('admin/report-transaction'); 

// });

// Route::get('/admin/report-review', function () {
//     return view('admin/report-review'); 

// });

// Route::get('/admin/report-discount', function () {
//     return view('admin/report-discount'); 

// });

// Route Admin
// Route::get('/admin/login', [LoginAdminController::class, 'index'])->name('admin.login');
//submit form
// Route::post('/admin/login', [LoginAdminController::class, 'login'])->name('admin.login.submit');

// Route User/Client
// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::get('/register', [RegisterController::class, 'index'])->name('register');