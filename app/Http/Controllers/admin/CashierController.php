<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\CashierOrder;
use App\Models\CashierOrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\FinanceTransactions;

class CashierController extends Controller
{
    // 1. Menampilkan Halaman Utama Kasir beserta Kategori
    public function index()
    {
        $categories = CategoryProduct::all();
        return view('admin.cashier', compact('categories'));
    }

    // 2. Load Produk secara Real-time via AJAX (Hanya Produk dengan Stok Bazar > 0)
    public function getProducts(Request $request)
    {
        $query = Product::with(['images', 'category', 'inventory', 'variants'])
                        ->where('status', 'Aktif');

        // Filter Pencarian Nama
        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter Berdasarkan Kategori
        if ($request->has('category_id') && !empty($request->category_id)) {
            $query->where('category_product_id', $request->category_id);
        }

        $products = $query->get()->filter(function ($product) {
            // Ambil produk jika punya varian dengan stok bazar > 0 ATAU jika non-varian dengan stok bazar > 0
            if ($product->variants->count() > 0) {
                return $product->variants->sum('stock_bazar') > 0;
            }
            return $product->inventory && $product->inventory->bazar_stock > 0;
        })->values();

        // Ambil data keranjang saat ini untuk disinkronkan ke UI
        $cart = session()->get('cashier_cart', []);

        return response()->json([
            'products' => $products,
            'cart' => $cart,
            'subtotal' => array_sum(array_column($cart, 'subtotal')),
        ]);
    }

    // 3. Tambah Item ke Keranjang Kasir
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'variant_id' => 'nullable|exists:product_variants,id',
        ]);

        $product = Product::findOrFail($request->product_id);
        $cartKey = $request->variant_id ? 'item_' . $request->product_id . '_' . $request->variant_id : 'item_' . $request->product_id;

        $cart = session()->get('cashier_cart', []);

        // Ambil info harga core & diskon
        $price = $product->selling_price;
        $discountAmount = ($product->discount / 100) * $price;
        $finalPrice = $price - $discountAmount;

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += 1;
            $cart[$cartKey]['subtotal'] = $cart[$cartKey]['quantity'] * $cart[$cartKey]['price'];
        } else {
            $variantName = null;
            if ($request->variant_id) {
                $variant = $product->variants()->find($request->variant_id);
                $variantName = $variant ? $variant->variant_value : null;
            }

            $cart[$cartKey] = [
                'product_id'     => $product->id,
                'variant_id'     => $request->variant_id,
                'name'           => $product->name . ($variantName ? ' (' . $variantName . ')' : ''),
                'image'          => $product->images->first() ? asset('storage/' . $product->images->first()->image_path) : asset('assets/img/products/poster-jersey.png'),
                'original_price' => $price,
                'price'          => $finalPrice,
                'quantity'       => 1,
                'subtotal'       => $finalPrice,
                'notes'          => ''
            ];
        }

        session()->put('cashier_cart', $cart);
        return response()->json(['success' => true, 'cart' => $cart]);
    }

    // 4. Update Jumlah Kuantitas atau Catatan Item di Keranjang
    public function updateCart(Request $request)
    {
        $request->validate([
            'key' => 'required',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string'
        ]);

        $cart = session()->get('cashier_cart', []);

        if (isset($cart[$request->key])) {
            $cart[$request->key]['quantity'] = intval($request->quantity);
            $cart[$request->key]['subtotal'] = $cart[$request->key]['quantity'] * $cart[$request->key]['price'];
            
            if ($request->has('notes')) {
                $cart[$request->key]['notes'] = $request->notes;
            }
            session()->put('cashier_cart', $cart);
        }

        return response()->json(['success' => true, 'cart' => $cart]);
    }

    // 5. Hapus Item Tertentu dari Keranjang
    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cashier_cart', []);

        if (isset($cart[$request->key])) {
            unset($cart[$request->key]);
            session()->put('cashier_cart', $cart);
        }

        return response()->json(['success' => true, 'cart' => $cart]);
    }

    // 6. Reset Bersihkan Keranjang
    public function clearCart()
    {
        session()->forget('cashier_cart');
        return response()->json(['success' => true]);
    }

    // 7. Simpan Checkout Transaksi Kasir & Potong Stok Bazar
    public function checkout(Request $request)
    {
        $cart = session()->get('cashier_cart', []);
        if (empty($cart)) {
            return response()->json(['success' => false, 'message' => 'Keranjang belanja kosong!'], 400);
        }

        try {
            $request->validate([
                'customer_name'  => 'nullable|string|max:100',
                'payment_method' => 'required|in:Tunai,QRIS',
                'paid_amount'       => 'nullable|numeric|min:0',
                'transaction_notes' => 'nullable|string'
            ]);

            DB::beginTransaction();

            $originalSubtotal = 0;
            $finalTotal = 0;

            foreach ($cart as $item) {
                $originalSubtotal += ($item['original_price'] * $item['quantity']);
                $finalTotal += $item['subtotal'];
            }

            $discount = $originalSubtotal - $finalTotal;

            // Jika QRIS, set paid_amount awal ke 0 (menunggu pembayaran)
            $paidAmount = $request->payment_method === 'Tunai' ? $request->paid_amount : 0;
            $changeAmount = $request->payment_method === 'Tunai' ? ($paidAmount - $finalTotal) : 0;

            if ($request->payment_method === 'Tunai' && $paidAmount < $finalTotal) {
                return response()->json(['success' => false, 'message' => 'Uang tunai yang dibayarkan kurang!'], 422);
            }

            $order = CashierOrder::create([
                'cashier_id'     => Auth::id(),
                'order_code'     => CashierOrder::generateOrderCode(),
                'customer_name'  => $request->customer_name ?? 'Umum',
                'subtotal'       => $originalSubtotal,
                'discount'       => $discount,
                'total'          => $finalTotal,
                'payment_method' => $request->payment_method,
                'payment_status' => $request->payment_method === 'Tunai' ? 'Lunas' : 'Pending',
                'paid_amount'    => $paidAmount,
                'change_amount'  => $changeAmount,
                'status'         => 'Proses',
                'notes'          => $request->transaction_notes,
            ]);

            foreach ($cart as $item) {
                CashierOrderItem::create([
                    'cashier_order_id'   => $order->id,
                    'product_id'         => $item['product_id'],
                    'product_variant_id' => $item['variant_id'],
                    'quantity'           => $item['quantity'],
                    'price'              => $item['price'],
                    'subtotal'           => $item['subtotal'],
                    'notes'              => $item['notes'],
                ]);

                $product = Product::find($item['product_id']);
                if ($item['variant_id']) {
                    $variant = $product->variants()->find($item['variant_id']);
                    if ($variant && $variant->stock_bazar >= $item['quantity']) {
                        $variant->decrement('stock_bazar', $item['quantity']);
                    } else {
                        throw new \Exception("Stok Bazar varian " . $product->name . " tidak cukup.");
                    }
                } else {
                    $inventory = $product->inventory;
                    if ($inventory && $inventory->bazar_stock >= $item['quantity']) {
                        $inventory->decrement('bazar_stock', $item['quantity']);
                    } else {
                        throw new \Exception("Stok Bazar produk " . $product->name . " tidak cukup.");
                    }
                }
            }

            $totalModal = 0;

            foreach ($cart as $item) {

                $product = Product::find($item['product_id']);

                $totalModal +=
                    $product->cost_price
                    *
                    $item['quantity'];
            }
            FinanceTransactions::create([
                'date'        => now(),
                'description' => 'Penjualan Kasir - ' . $order->order_code,
                'category'    => 'Penjualan',
                'type'        => 'Pemasukan',
                'amount'      => $order->total,
            ]);

            FinanceTransactions::create([
                'date'        => now(),
                'description' => 'Modal Barang - ' . $order->order_code,
                'category'    => 'Modal',
                'type'        => 'Pengeluaran',
                'amount'      => $totalModal,
            ]);

            DB::commit();

            $order->load('items');
            $order->items->transform(function ($item) use ($cart) {
                foreach ($cart as $cartItem) {
                    if ($cartItem['product_id'] == $item->product_id && $cartItem['variant_id'] == $item->product_variant_id) {
                        $item->product_name = $cartItem['name'];
                        break;
                    }
                }
                return $item;
            });
            
            session()->forget('cashier_cart');

            // INTEGRASI MIDTRANS
            if ($request->payment_method === 'QRIS') {
                Config::$serverKey = config('services.midtrans.server_key');
                Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
                Config::$isSanitized = true;
                Config::$is3ds = true;

                $params = [
                    'transaction_details' => [
                        'order_id'     => $order->order_code,
                        'gross_amount' => (int) $order->total,
                    ],
                    'customer_details' => [
                        'first_name' => $order->customer_name,
                    ],
                    'enabled_payments' => ['other_qris', 'gopay', 'shopeepay'] 
                ];

                $snapToken = Snap::getSnapToken($params);

                return response()->json([
                    'success'    => true,
                    'message'    => 'Menunggu pembayaran QRIS',
                    'order'      => $order,
                    'snap_token' => $snapToken // Kirim token ke view
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil disimpan!',
                'order'   => $order
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'line'    => $e->getLine(),
                'file'    => basename($e->getFile()),
            ], 500);
        }
    }

    // 8. Tambahkan Webhook Callback Midtrans
    public function callback(Request $request)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        
        if ($hashed == $request->signature_key) {
            $order = CashierOrder::where('order_code', $request->order_id)->first();
            
            if ($order) {
                if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                    $order->update([
                        'status'         => 'Selesai',
                        'payment_status' => 'Lunas',
                        'paid_amount'    => $order->total, 
                    ]);
                } elseif ($request->transaction_status == 'expire' || $request->transaction_status == 'cancel') {
                    $order->update([
                        'status' => 'Dibatalkan'
                    ]);
                }
            }
        }
        return response()->json(['message' => 'Callback received']);
    }

    public function orders()
    {
        $orders = CashierOrder::with(['items.product'])
            ->orderBy('is_pinned', 'desc')
            ->orderByRaw("FIELD(status, 'Proses', 'Selesai', 'Gagal', 'Dibatalkan') ASC")
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.cashier-orders', compact('orders'));
    }

    public function markDoneOrder(Request $request)
    {
        $request->validate(['id' => 'required|exists:cashier_orders,id']);
        
        $order = CashierOrder::findOrFail($request->id);
        $order->update([
            'status' => 'Selesai',
            'is_pinned' => false,
            'pinned_at' => null // Lepas pin jika sudah selesai
        ]);

        return response()->json(['success' => true]);
    }
    public function togglePinOrder(Request $request)
    {
        $request->validate(['id' => 'required|exists:cashier_orders,id']);
        
        $order = CashierOrder::findOrFail($request->id);
        
        if ($order->status === 'Selesai') {
            return response()->json(['success' => false, 'message' => 'Pesanan sudah selesai.']);
        }

        $order->update([
            'is_pinned' => !$order->is_pinned,
            'pinned_at' => !$order->is_pinned ? now() : null
        ]);

        return response()->json(['success' => true, 'is_pinned' => $order->is_pinned]);
    }

    public function recap(Request $request)
    {
        \Carbon\Carbon::setLocale('id'); // Set bahasa hari/bulan ke Indonesia

        $filter = $request->get('filter', 'today');
        
        $prevStart = $prevEnd = $nextStart = $nextEnd = null;

        if ($filter == 'today') {
            $date = $request->get('date', now()->format('Y-m-d'));
            $start = \Carbon\Carbon::parse($date)->startOfDay();
            $end = \Carbon\Carbon::parse($date)->endOfDay();
            
            $displayDate = '<span class="font-bold">' . $start->translatedFormat('l') . '</span><br><span>' . $start->format('d/m/Y') . '</span>';
            
            $prevStart = $prevEnd = $start->copy()->subDay()->format('Y-m-d');
            $nextStart = $nextEnd = $start->copy()->addDay()->format('Y-m-d');
            
        } elseif ($filter == '7days') {
            $end = $request->get('end_date') ? \Carbon\Carbon::parse($request->get('end_date'))->endOfDay() : now()->endOfDay();
            $start = $end->copy()->subDays(6)->startOfDay(); // Total 7 hari
            
            $displayDate = '<span class="font-bold">' . $start->translatedFormat('l d/m/Y') . ' - </span><br><span class="font-bold">' . $end->translatedFormat('l d/m/Y') . '</span>';
            
            $prevEnd = $end->copy()->subDays(7)->format('Y-m-d');
            $nextEnd = $end->copy()->addDays(7)->format('Y-m-d');

        } elseif ($filter == '1month') {
            $end = $request->get('end_date') ? \Carbon\Carbon::parse($request->get('end_date'))->endOfDay() : now()->endOfDay();
            $start = $end->copy()->subMonth()->addDay()->startOfDay();
            
            $displayDate = '<span class="font-bold">' . $start->translatedFormat('l d/m/Y') . ' - </span><br><span class="font-bold">' . $end->translatedFormat('l d/m/Y') . '</span>';
            
            $prevEnd = $end->copy()->subMonth()->format('Y-m-d');
            $nextEnd = $end->copy()->addMonth()->format('Y-m-d');

        } else { // custom
            $start = \Carbon\Carbon::parse($request->get('start_date'))->startOfDay();
            $end = \Carbon\Carbon::parse($request->get('end_date'))->endOfDay();
            
            $displayDate = '<span class="font-bold text-[12px]">' . $start->translatedFormat('l d/m/Y') . ' - </span><br><span class="font-bold text-[12px]">' . $end->translatedFormat('l d/m/Y') . '</span>';
            
            $diff = $start->diffInDays($end) + 1;
            $prevStart = $start->copy()->subDays($diff)->format('Y-m-d');
            $prevEnd = $end->copy()->subDays($diff)->format('Y-m-d');
            $nextStart = $start->copy()->addDays($diff)->format('Y-m-d');
            $nextEnd = $end->copy()->addDays($diff)->format('Y-m-d');
        }

        $startDate = $start->format('Y-m-d H:i:s');
        $endDate = $end->format('Y-m-d H:i:s');

        // 1. Data Metrik (Hanya status Selesai)
        $completedOrders = CashierOrder::whereBetween('created_at', [$startDate, $endDate])->where('status', 'Selesai')->get();
        
        $totalPenjualan = $completedOrders->sum('total');
        $totalTransaksi = $completedOrders->count();
        $completedOrders->load('items');
        $itemTerjual = $completedOrders->flatMap->items->sum('quantity');
        $rataRata = $totalTransaksi > 0 ? $totalPenjualan / $totalTransaksi : 0;

        // 2. Top Item Terlaris
        $topItems = CashierOrderItem::whereHas('order', function($q) use ($startDate, $endDate) {
                $q->whereBetween('created_at', [$startDate, $endDate])->where('status', 'Selesai');
            })
            ->with('product')
            ->select('product_id', \DB::raw('SUM(quantity) as total_qty'), \DB::raw('SUM(subtotal) as total_revenue'))
            ->groupBy('product_id')
            ->orderByDesc('total_qty')
            ->limit(3)
            ->get();

        // 3. Riwayat Transaksi (Semua Status)
        $historyOrders = CashierOrder::with('items.product')->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.cashier-recap', compact(
            'filter', 'displayDate', 'prevStart', 'prevEnd', 'nextStart', 'nextEnd',
            'totalPenjualan', 'totalTransaksi', 'itemTerjual', 'rataRata',
            'topItems', 'historyOrders'
        ));
    }
}