<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Exports\FinanceExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\FinanceTransactions;
use App\Models\Notification;
use App\Models\OnlineOrder;
use App\Models\OnlineOrderItem;
use App\Models\VoucherUsage;

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
use App\Http\Controllers\Client\ProfileController;


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
            
            Route::get('/cashier', [CashierController::class, 'index'])->name('admin.cashier');
            Route::get('/cashier/products', [CashierController::class, 'getProducts']);
            
            // Manajemen Keranjang (Session-Based POS)
            Route::post('/cashier/cart/add', [CashierController::class, 'addToCart']);
            Route::post('/cashier/cart/update', [CashierController::class, 'updateCart']);
            Route::post('/cashier/cart/remove', [CashierController::class, 'removeFromCart']);
            Route::post('/cashier/cart/clear', [CashierController::class, 'clearCart']);
            
            // Proses Pembayaran & Transaksi
            Route::post('/cashier/checkout', [CashierController::class, 'checkout']);

            Route::get('/cashier/orders', [CashierController::class, 'orders'])->name('admin.cashier.orders');
            Route::post('/cashier/orders/pin', [CashierController::class, 'togglePinOrder']);
            Route::post('/cashier/orders/done', [CashierController::class, 'markDoneOrder']);
            
            Route::get('/cashier/recap', [CashierController::class, 'recap'])->name('admin.cashier.recap');
        });
    });

    // CLIENT - Cart, Checkout, Payment
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{itemId}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{itemId}', [CartController::class, 'remove'])->name('cart.remove');

    Route::post('/checkout/update-qty', function () {
        $key = request('key'); // product_id_variant_id
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
            // pakai kombinasi product_id + variant_id sebagai key
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

        if (empty($selectedIds)) {
            return redirect('/cart');
        }

        // expand per item karena satu product bisa punya beberapa variant
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
            ->where('end_date', '>=', now())
            ->get();

        return view('checkout', compact('products', 'vouchers'));
    });

    Route::post('/payment', function () {
        $selectedIds  = session('checkout_products', []);
        $checkoutItems = session('checkout_items', []);
        $voucherCode = request('voucher_code');
        $voucher = null;

        if ($voucherCode) {
            $voucher = Voucher::where('code', $voucherCode)
                ->where('status', 'Aktif')
                ->where('end_date', '>=', now())
                ->first();

            if ($voucher && $voucher->used_quota >= $voucher->quota) {
                $voucher = null;
            }
        }

        if (empty($selectedIds)) {
            return redirect('/cart');
        }

        $products = Product::with(['images'])
            ->whereIn('id', $selectedIds)
            ->get()
            ->map(function ($product) use ($checkoutItems) {
                $item = collect($checkoutItems)->firstWhere('product_id', $product->id);
                $product->checkout_qty = $item['quantity'] ?? 1;
                return $product;
            });

        $subtotal = $products->sum(fn($p) =>
            ($p->selling_price - ($p->selling_price * $p->discount / 100)) * $p->checkout_qty
        );

        $total = $subtotal;

        $discountAmount = 0;

        if ($voucher) {
            $discountAmount = ($subtotal * $voucher->value) / 100;
            $total -= $discountAmount;
        }

        $orderId = 'REKAPS-' . auth()->id() . '-' . time();

        $order = OnlineOrder::create([
            'user_id'        => auth()->id(),
            'order_code'     => $orderId,
            'subtotal'       => $subtotal,
            'discount' => $discountAmount,
            'total' => $total,
            'payment_method' => 'QRIS',
            'payment_status' => 'Pending',
            'status'         => 'Pending',
        ]);

        if ($voucher) {

            VoucherUsage::create([
                'voucher_id' => $voucher->id,
                'user_id'    => auth()->id(),
                'order_id'   => $order->id,
                'used_at'    => now(),
            ]);

            $voucher->increment('used_quota');
        }

        foreach ($products as $product) {

            $price = $product->selling_price
                - ($product->selling_price * $product->discount / 100);

            $item = collect($checkoutItems)
                ->firstWhere('product_id', $product->id);

            OnlineOrderItem::create([
                'online_order_id'   => $order->id,
                'product_id'        => $product->id,
                'product_variant_id'=> $item['variant_id'] ?? null,
                'quantity'          => $product->checkout_qty,
                'price'             => $price,
                'subtotal'          => $price * $product->checkout_qty,
            ]);
            
        }

        $itemDetails = $products->map(fn($p) => [
            'id'       => (string) $p->id,
            'price'    => (int) ($p->selling_price - ($p->selling_price * $p->discount / 100)),
            'quantity' => (int) $p->checkout_qty,
            'name'     => $p->name,
        ])->toArray();

        if ($discountAmount > 0) {
            $itemDetails[] = [
                'id'       => 'VOUCHER',
                'price'    => -(int) $discountAmount,
                'quantity' => 1,
                'name'     => 'Voucher Discount',
            ];
        }

        $payload = [
            'payment_type' => 'qris',
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => (int) $total,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email'      => auth()->user()->email,
            ],
            'item_details' => $itemDetails,
        ];

        try {
            $response = \Illuminate\Support\Facades\Http::withBasicAuth(
                config('services.midtrans.server_key'), ''
            )->post('https://api.sandbox.midtrans.com/v2/charge', $payload);

            $data = $response->json();

            if ($response->failed()) {
                return redirect('/checkout')->with('error', 'Gagal membuat transaksi: ' . $response->body());
            }

            // QR dari qr_string, perlu di-encode jadi image via API
            $qrString = $data['qr_string'] ?? null;

            $qrUrl = $qrString 
                ? 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($qrString)
                : null;

            $order->update([
                'snap_token'   => $qrString,
            ]);

            session([
                'payment_total'    => $total,
                'payment_qr_url'   => $qrUrl,
                'payment_order_id' => $data['order_id'] ?? $orderId,
                'payment_expiry'   => $data['expiry_time'] ?? null,
            ]);

            $cart = \App\Models\Cart::where(
                'user_id',
                auth()->id()
            )->first();

            if ($cart) {
                \App\Models\CartItem::where(
                    'cart_id',
                    $cart->id
                )->delete();
            }

            return redirect('/payment');

        } catch (\Exception $e) {
            return redirect('/checkout')->with('error', 'Error: ' . $e->getMessage());
        }
    });

    Route::post('/payment/webhook', function (\Illuminate\Http\Request $request) {
        $data          = $request->all();
        $orderId       = $data['order_id'];
        $statusCode    = $data['status_code'];
        $grossAmount   = $data['gross_amount'];
        $signatureKey  = $data['signature_key'];

        // Verifikasi signature
        $expectedSignature = hash('sha512', $orderId . $statusCode . $grossAmount . config('services.midtrans.server_key'));

        if ($signatureKey !== $expectedSignature) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $transactionStatus = $data['transaction_status'];

        $order = \App\Models\OnlineOrder::where('order_code', $orderId)->first();

        if ($order) {
            if (in_array($transactionStatus, ['settlement', 'capture'])) {

                $order->update([
                    'payment_status' => 'Paid',
                    'status'         => 'Pending',
                ]);

            } elseif ($transactionStatus === 'expire') {

                $order->update([
                    'payment_status' => 'Expired',
                ]);

            } elseif (in_array($transactionStatus, ['cancel', 'deny'])) {

                $order->update([
                    'payment_status' => 'Cancelled',
                    'status'         => 'Dibatalkan',
                ]);

            }
        }

        return response()->json(['message' => 'OK']);
    })->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

    Route::get('/payment', function () {
        $total = session('payment_total');
        $qrUrl    = session('payment_qr_url');
        $orderId  = session('payment_order_id');

        if (!$total) {
            return redirect('/cart');
        }

        return view('payment', compact('total', 'qrUrl', 'orderId'));
    });

    Route::get('/test-paid/{orderCode}', function ($orderCode) {

        $order = OnlineOrder::where(
            'order_code',
            $orderCode
        )->firstOrFail();

        $order->update([
            'payment_status' => 'Paid',
            'status' => 'Pending'
        ]);

        return 'OK';
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

    Route::post('/notifications/{notification}/read', function (\App\Models\Notification $notification) {

        if ($notification->user_id === auth()->id()) {
            $notification->update([
                'is_read' => true
            ]);
        }

        return response()->json([
            'success' => true
        ]);
    })->middleware('auth');

    Route::get('/profile/orders', [ProfileController::class, 'orders']);

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

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