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
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Admin\DiscountController;

// Controller User
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\VerificationCodeController;
use App\Http\Controllers\Auth\ResetPasswordController;


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

Route::post('/checkout', function () {
    $selectedIds = request('selected_products', []);

    if (empty($selectedIds)) {
        return redirect('/cart')->with('error', 'Pilih produk terlebih dahulu.');
    }

    session(['checkout_products' => $selectedIds]);

    return redirect('/checkout');
});

Route::get('/checkout', function () {
    $selectedIds = session('checkout_products', []);

    if (empty($selectedIds)) {
        return redirect('/cart');
    }

    $products = Product::with(['category', 'images', 'variants'])
        ->whereIn('id', $selectedIds)
        ->get();

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

Route::get('/admin', function () {
    return view('admin/dashboard');
});


// 3. SECURE AREA (Hanya bisa diakses jika SUDAH login)

Route::middleware(['auth', 'check.banned'])->group(function () {
    Route::get('/admin/profile', function () { return view('admin.profile'); })->name('admin.profile');
    Route::get('/admin/profile/edit', function () { return view('admin.profile-edit'); })->name('admin.profile.edit');
    Route::post( '/admin/profile/update', [ProfileController::class,'update'])->name('admin.profile.update');

    // Route::get('/admin/finance', function (Request $request) {

    //     $transactions = FinanceTransactions::query()

    //         ->when($request->search, function ($query) use ($request) {

    //             $query->where('description', 'like', '%' . $request->search . '%')
    //                   ->orWhere('category', 'like', '%' . $request->search . '%');

    //         })

    //         ->when($request->type && $request->type != 'Semua', function ($query) use ($request) {

    //             $query->where('type', $request->type);

    //         })

    //         ->when($request->from_date, function ($query) use ($request) {

    //             $query->whereDate('date', '>=', $request->from_date);

    //         })

    //         ->when($request->to_date, function ($query) use ($request) {

    //             $query->whereDate('date', '<=', $request->to_date);

    //         })

    //         ->latest()
    //         ->get();

    //         $totalIncome = FinanceTransactions::where('type', 'Pemasukan')->sum('amount');

    //         $totalExpense = FinanceTransactions::where('type', 'Pengeluaran')->sum('amount');

    //         $balance = $totalIncome - $totalExpense;

    //     return view(
    //         'admin.finance',
    //         compact('transactions',
    //         'totalIncome',
    //         'totalExpense',
    //         'balance'
    //         )
    //     );
    // });

    Route::post('/admin/finance/store', function (Request $request) {

        FinanceTransactions::create([
            'date' => $request->date,
            'description' => $request->description,
            'category' => $request->category,
            'type' => $request->type,
            'amount' => $request->amount,
        ]);

        return redirect('/admin/finance');
    });

    Route::delete('/admin/finance/delete/{id}', function ($id) {

        FinanceTransactions::findOrFail($id)->delete();

        return redirect('/admin/finance');
    });

    Route::post('/admin/finance/update/{id}', function (Illuminate\Http\Request $request, $id) {

        FinanceTransactions::findOrFail($id)->update([
            'amount' => $request->amount,
            'type' => $request->type,
            'date' => $request->date,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect('/admin/finance');
    });
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
            // Route::get('/finance', function () { return view('admin.finance'); })->name('admin.finance');
            Route::get('/finance', function (Request $request) {

                $transactions = FinanceTransactions::query()

                    ->when($request->search, function ($query) use ($request) {

                        $query->where('description', 'like', '%' . $request->search . '%')
                            ->orWhere('category', 'like', '%' . $request->search . '%');
                    })

                    ->when($request->type && $request->type != 'Semua', function ($query) use ($request) {

                        $query->where('type', $request->type);
                    })

                    ->when($request->from_date, function ($query) use ($request) {

                        $query->whereDate('date', '>=', $request->from_date);
                    })

                    ->when($request->to_date, function ($query) use ($request) {

                        $query->whereDate('date', '<=', $request->to_date);
                    })

                    ->latest()
                    ->get();

                $totalIncome = FinanceTransactions::where('type', 'Pemasukan')->sum('amount');

                $totalExpense = FinanceTransactions::where('type', 'Pengeluaran')->sum('amount');

                $balance = $totalIncome - $totalExpense;

                return view(
                    'admin.finance',
                    compact(
                        'transactions',
                        'totalIncome',
                        'totalExpense',
                        'balance'
                    )
                );
            });
        });

        // Modul Promo / Diskon
        Route::middleware(['permission:diskon'])->group(function () {
            Route::get('/promo', [VoucherController::class, 'index'])
                ->name('admin.promo');
        });

        Route::middleware(['permission:laporan'])->group(function () {
            Route::get('/reports', function () {
                return view('admin.reports');
            });
            Route::get('/report-sales', function () {
                return view('admin.report-sales');
            });
            Route::get('/report-finance', function () {
                return view('admin.report-finance');
            });
            Route::get('/report-stock', function () {
                return view('admin.report-stock');
            });
            Route::get('/report-transaction', function () {
                return view('admin.report-transaction');
            });
            Route::get('/report-review', function () {
                return view('admin.report-review');
            });
            Route::get('/report-discount', function () {
                return view('admin.report-discount');
            });
        });
    });

    // KASIR
    Route::prefix('pengurus')->middleware(['role:admin|pengurus'])->group(function () {
        Route::get('/cashier', function () {
            return view('pengurus.cashier');
        })->name('pengurus.cashier');
        Route::get('/cashier-orders', function () {
            return view('pengurus.cashier-orders');
        })->name('pengurus.cashier.orders');
        Route::get('/cashier-recap', function () {
            return view('pengurus.cashier-recap');
        })->name('pengurus.cashier.recap');
    });
});

Route::get('/admin/report-finance', function () {

    $query = FinanceTransactions::query();

    if (request('search')) {
        $query->where(
            'description',
            'like',
            '%' . request('search') . '%'
        );
    }

    if (request('from_date')) {
        $query->whereDate(
            'date',
            '>=',
            request('from_date')
        );
    }

    if (request('to_date')) {
        $query->whereDate(
            'date',
            '<=',
            request('to_date')
        );
    }

    $transactions = $query
        ->latest()
        ->get();

    $totalIncome = (clone $query)
        ->where('type', 'Pemasukan')
        ->sum('amount');

    $totalExpense = (clone $query)
        ->where('type', 'Pengeluaran')
        ->sum('amount');

    $balance = $totalIncome - $totalExpense;

    $totalTransactions = $transactions->count();

    return view(
        'admin.report-finance',
        compact(
            'transactions',
            'totalIncome',
            'totalExpense',
            'balance',
            'totalTransactions'
        )
    );
});

Route::get('/admin/report-finance/export', function () {

    return Excel::download(
        new FinanceExport,
        'laporan-keuangan.xlsx'
    );
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
//route diskon
Route::post(
    '/admin/discount',
    [DiscountController::class, 'store']
)->name('admin.discount.store');

//route update diskon
Route::put(
    '/admin/discount/{discount}',
    [DiscountController::class, 'update']
)->name('admin.discount.update');

//route delete diskon
Route::delete(
    '/admin/discount/{discount}',
    [DiscountController::class, 'destroy']
)->name('admin.discount.destroy');

//route voucher
Route::post(
    '/admin/voucher/store',
    [VoucherController::class, 'store']
)->name('admin.voucher.store');

//delete voucher
Route::delete(
    '/admin/voucher/{voucher}',
    [VoucherController::class, 'destroy']
)->name('admin.voucher.destroy');

//edit voucher
Route::put(
    '/admin/voucher/{voucher}',
    [VoucherController::class, 'update']
)->name('admin.voucher.update');

// Route Admin
// Route::get('/admin/login', [LoginAdminController::class, 'index'])->name('admin.login');
//submit form
// Route::post('/admin/login', [LoginAdminController::class, 'login'])->name('admin.login.submit');

// Route User/Client
// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::get('/register', [RegisterController::class, 'index'])->name('register');
