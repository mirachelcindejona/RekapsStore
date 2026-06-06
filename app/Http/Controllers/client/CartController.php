<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Voucher;

class CartController extends Controller
{
    // Tampilkan halaman cart
    public function index()
    {
        $cart = Cart::where('user_id', auth()->id())->first();

        $items = $cart
            ? CartItem::with(['product.images', 'product.variants'])
                ->where('cart_id', $cart->id)
                ->get()
            : collect();

        return view('cart', compact('items'));
    }

    // Tambah produk ke cart
    public function add(Request $request)
    {
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

        $existing = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $request->product_id)
            ->where('product_variant_id', $request->variant_id ?: null)
            ->first();

        if ($existing) {
            $existing->increment('quantity', $request->quantity ?? 1);
        } else {
            CartItem::create([
                'cart_id'            => $cart->id,
                'product_id'         => $request->product_id,
                'product_variant_id' => $request->variant_id ?: null,
                'quantity'           => $request->quantity ?? 1,
            ]);
        }

        // Kalau dari tombol "Beli Sekarang"
        if ($request->redirect === 'checkout') {
            $qty = (int) ($request->quantity ?? 1);
            $variantId = $request->variant_id ?: null;

            session([
                'checkout_products' => [$request->product_id],
                'checkout_items' => [
                    [
                        'product_id' => $request->product_id,
                        'variant_id' => $variantId,
                        'quantity'   => $qty,
                    ]
                ],
                'checkout_qtys' => [
                    $request->product_id => $qty,
                ],
            ]);

            return redirect('/checkout');
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    // Update quantity
    public function update(Request $request, $itemId)
    {
        $item = CartItem::where('id', $itemId)
            ->whereHas('cart', fn($q) => $q->where('user_id', auth()->id()))
            ->firstOrFail();

        if ($request->quantity < 1) {
            $item->delete();
        } else {
            $item->update(['quantity' => $request->quantity]);
        }

        return response()->json(['success' => true]);
    }

    // Hapus item dari cart
    public function remove($itemId)
    {
        CartItem::where('id', $itemId)
            ->whereHas('cart', fn($q) => $q->where('user_id', auth()->id()))
            ->delete();

        return redirect()->back()->with('success', 'Produk dihapus dari keranjang.');
    }
}