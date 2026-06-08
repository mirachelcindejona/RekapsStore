<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use \App\Models\OnlineOrderItem;
use \App\Models\CashierOrderItem;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $totalProducts = Product::count();
        $countReady = Product::where('product_type', 'Ready Stok')->count();
        $countPO = Product::where('product_type', 'PO')->count();
        $countJasa = Product::where('product_type', 'Jasa')->count();
        $categories = CategoryProduct::withCount('products')->get();
        
        $query = Product::with(['category', 'inventory', 'images', 'variants'])->latest();

        // Filter Kategori (Jika dipilih)
        if ($request->filled('category')) {
            $query->where('category_product_id', $request->category);
        }

        // Filter Tipe (Jika diklik dari Tab)
        if ($request->filled('type')) {
            $query->where('product_type', $request->type);
        }

        // Filter Status (Jika dipilih)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $products = $query->get();

        return view('admin.product', compact(
            'products', 
            'categories', 
            'totalProducts', 
            'countReady', 
            'countPO', 
            'countJasa'
        ));
    }

    public function create()
    {
        $categories = CategoryProduct::all();
        return view('admin.product-add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                => 'required|string|max:255',
            'category_product_id' => 'required|exists:categories_product,id',
            'product_type'        => 'required|in:Ready Stok,PO,Jasa',
            'product_code'        => 'required|string|max:50|unique:products,product_code',
            'selling_price'       => 'required|numeric|min:0',
            'cost_price'          => 'nullable|numeric|min:0',
            'discount'            => 'nullable|numeric|min:0|max:100',
            'images'              => 'nullable|array|max:6',
            'images.*'            => 'image|mimes:jpeg,png,jpg|max:5120',
        ], [
            'product_code.unique' => 'Kode produk ini sudah digunakan. Silakan gunakan kode lain.',
            'images.max'          => 'Maksimal foto yang diizinkan adalah 6 foto.',
            'images.*.max'        => 'Ukuran foto maksimal adalah 5MB per foto.'
        ]);

        try {
            DB::beginTransaction();

            $product = Product::create([
                'category_product_id' => $request->category_product_id,
                'name'                => $request->name,
                'slug'                => Str::slug($request->name . '-' . $request->product_code), 
                'description'         => $request->description,
                'product_code'        => $request->product_code,
                'product_type'        => $request->product_type,
                'estimation'          => $request->estimation,
                'pickup_info'         => $request->pickup_info,
                'cost_price'          => $request->cost_price ?? 0,
                'selling_price'       => $request->selling_price,
                'discount'            => $request->discount ?? 0,
                'status'              => $request->status ?? 'Aktif',
                'is_processed'        => true,
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('product_images', 'public');
                    $product->images()->create([
                        'image_path' => $path
                    ]);
                }
            }

            $totalMainStock = $request->main_stock ?? 0;

            if ($request->has('variant_combo_names') && is_array($request->variant_combo_names) && count($request->variant_combo_names) > 0) {
                
                $masterName = $request->variant_master_name ?? 'Varian'; 
                
                $values = $request->variant_combo_names;
                $stocks = $request->variant_combo_stocks;

                foreach ($values as $index => $val) {
                    $stockOnline = isset($stocks[$index]) ? intval($stocks[$index]) : 0;

                    $product->variants()->create([
                        'variant_name'  => $masterName,
                        'variant_value' => $val,
                        'stock_online'  => $stockOnline,
                        'stock_bazar'   => 0,
                    ]);
                }
            } else {
                $product->inventory()->create([
                    'main_stock'  => intval($request->main_stock ?? 0),
                    'bazar_stock' => 0,
                ]);
            }

            $product->inventory()->create([
                'main_stock'  => $totalMainStock,
                'bazar_stock' => 0,
                'min_stock'   => $request->min_stock ?? 0,
            ]);

            DB::commit();

            return redirect('/admin/product')->with('success', 'Produk berhasil ditambahkan!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }

    public function show($slug)
    {
        $product = Product::with(['category', 'images', 'inventory', 'variants', 'stockHistories'])
                          ->where('slug', $slug)
                          ->firstOrFail();
        
        return view('admin.product-detail', compact('product'));
    }

    public function edit($slug)
    {
        $product = Product::with(['category', 'images', 'inventory', 'variants'])
            ->where('slug', $slug)
            ->firstOrFail();
            
        $categories = CategoryProduct::all();

        return view('admin.product-edit', compact('product', 'categories'));
    }

    public function update(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $request->validate([
            'name'                => 'required|string|max:255',
            'category_product_id' => 'required|exists:categories_product,id',
            'product_type'        => 'required|in:Ready Stok,PO,Jasa',
            'product_code'        => 'required|string|max:50|unique:products,product_code,' . $product->id,
            'selling_price'       => 'required|numeric|min:0',
            'cost_price'          => 'nullable|numeric|min:0',
            'discount'            => 'nullable|numeric|min:0|max:100',
            'images'              => 'nullable|array|max:6',
            'images.*'            => 'image|mimes:jpeg,png,jpg|max:5120',
        ], [
            'product_code.unique' => 'Kode produk ini sudah digunakan. Silakan gunakan kode lain.',
            'images.max'          => 'Maksimal foto yang diizinkan adalah 6 foto.',
            'images.*.max'        => 'Ukuran foto maksimal adalah 5MB per foto.'
        ]);

        try {
            DB::beginTransaction();

            $product->update([
                'category_product_id' => $request->category_product_id,
                'name'                => $request->name,
                'slug'                => Str::slug($request->name . '-' . $request->product_code), 
                'description'         => $request->description,
                'product_code'        => $request->product_code,
                'product_type'        => $request->product_type,
                'estimation'          => $request->estimation,
                'pickup_info'         => $request->pickup_info,
                'cost_price'          => $request->cost_price ?? 0,
                'selling_price'       => $request->selling_price,
                'discount'            => $request->discount ?? 0,
                'status'              => $request->status ?? 'Aktif',
            ]);

            if ($request->has('deleted_images') && is_array($request->deleted_images)) {
                foreach ($request->deleted_images as $imageId) {
                    $image = $product->images()->find($imageId);
                    if ($image) {
                        Storage::disk('public')->delete($image->image_path);
                        $image->delete();
                    }
                }
            }

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('product_images', 'public');
                    $product->images()->create([
                        'image_path' => $path
                    ]);
                }
            }

            $inventory = $product->inventory;
            if ($inventory) {
                $inventory->update([
                    'min_stock' => $request->min_stock ?? 0,
                ]);
            } else {
                $inventory = $product->inventory()->create([
                    'main_stock'  => 0,
                    'bazar_stock' => 0,
                    'min_stock'   => $request->min_stock ?? 0,
                ]);
            }

            if ($request->has('variant_combo_names') && is_array($request->variant_combo_names) && count($request->variant_combo_names) > 0) {
                
                $masterName = $request->variant_master_name ?? 'Varian'; 
                $values = $request->variant_combo_names;
                $stocks = $request->variant_combo_stocks;

                $existingVariantIds = $product->variants->pluck('id')->toArray();
                $processedVariantIds = [];

                foreach ($values as $index => $val) {
                    $stockOnline = isset($stocks[$index]) ? intval($stocks[$index]) : 0;

                    // Cek apakah varian ini udah ada sebelumnya
                    $variant = $product->variants()->where('variant_value', $val)->first();

                    if ($variant) {
                        // Jika ada, update stok onlinenya (stok bazar dibiarkan)
                        $variant->update([
                            'variant_name' => $masterName,
                            'stock_online' => $stockOnline,
                        ]);
                        $processedVariantIds[] = $variant->id;
                    } else {
                        // Jika tidak ada, buat varian baru
                        $newVariant = $product->variants()->create([
                            'variant_name'  => $masterName,
                            'variant_value' => $val,
                            'stock_online'  => $stockOnline,
                            'stock_bazar'   => 0,
                        ]);
                        $processedVariantIds[] = $newVariant->id;
                    }
                }

                // Hapus varian lama yang tidak dikirim lagi di form edit
                $variantsToDelete = array_diff($existingVariantIds, $processedVariantIds);
                if (count($variantsToDelete) > 0) {
                    $product->variants()->whereIn('id', $variantsToDelete)->delete();
                }

                // Hitung total stok dari semua varian untuk di sync ke main_stock
                $totalMainStock = $product->variants()->sum('stock_online') + $product->variants()->sum('stock_bazar');
                $inventory->update(['main_stock' => $totalMainStock]);

            } else {
                // Hapus semua varian yang mungkin ada sebelumnya
                $product->variants()->delete();

                // Update stok utama langsung
                $inventory->update([
                    'main_stock'  => intval($request->main_stock ?? 0),
                ]);
            }

            DB::commit();
            return redirect('/admin/product')->with('success', 'Produk berhasil diperbarui!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }

    // Menghapus Produk
    public function destroy($slug)
    {
        try {
            DB::beginTransaction();

            $product = Product::where('slug', $slug)->firstOrFail();

            // Cek apakah produk punya riwayat order
            $hasOnlineOrder = OnlineOrderItem::where('product_id', $product->id)->exists();
            $hasCashierOrder = CashierOrderItem::where('product_id', $product->id)->exists();

            if ($hasOnlineOrder || $hasCashierOrder) {
                // Tidak bisa dihapus, non-aktifkan saja
                $product->update(['status' => 'Non-Aktif']);
                DB::commit();
                return redirect('/admin/product')->with('warning', 'Produk tidak dapat dihapus karena memiliki riwayat transaksi. Produk telah dinonaktifkan.');
            }

            // Tidak ada riwayat order, boleh hapus permanen
            if ($product->images && $product->images->count() > 0) {
                foreach ($product->images as $image) {
                    if (Storage::disk('public')->exists($image->image_path)) {
                        Storage::disk('public')->delete($image->image_path);
                    }
                }
            }

            $product->variants()->delete();
            $product->inventory()->delete();
            $product->images()->delete();
            $product->reviews()->delete();
            $product->stockHistories()->delete();
            $product->delete();

            DB::commit();

            return redirect('/admin/product')->with('success', 'Produk berhasil dihapus secara permanen!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/admin/product')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Memproses Mutasi Stok
    public function updateStock(Request $request, $slug)
    {
        $request->validate([
            'type' => 'required|in:Masuk,Keluar',
            'location' => 'required|in:Online,Bazar',
            'qty' => 'required|numeric|min:1',
            'note' => 'required|string',
            'variant_id' => 'nullable|exists:product_variants,id'
        ]);

        $product = Product::where('slug', $slug)->firstOrFail();
        $qty = $request->qty;

        try {
            DB::beginTransaction();

            // Simpan ke Riwayat Mutasi beserta USER ID
            $product->stockHistories()->create([
                'product_variant_id' => $request->variant_id,
                'user_id'            => auth()->id(),
                'type'               => $request->type,
                'location'           => $request->location,
                'qty'                => $qty,
                'note'               => $request->note,
            ]);

            // 2. Update Angka Stok Berdasarkan Pilihan
            if ($request->variant_id) {
                // Update Stok di Varian
                $variant = $product->variants()->findOrFail($request->variant_id);
                $kolomStok = $request->location == 'Online' ? 'stock_online' : 'stock_bazar';
                
                if ($request->type == 'Masuk') {
                    $variant->increment($kolomStok, $qty);
                } else {
                    // Validasi agar stok tidak minus
                    if ($variant->$kolomStok < $qty) {
                        return back()->with('error', 'Stok varian tidak mencukupi untuk dikeluarkan.');
                    }
                    $variant->decrement($kolomStok, $qty);
                }
            } else {
                // Update Stok di Inventory Utama (Jika produk tidak punya varian)
                $inventory = $product->inventory;
                $kolomStok = $request->location == 'Online' ? 'main_stock' : 'bazar_stock';

                if ($request->type == 'Masuk') {
                    $inventory->increment($kolomStok, $qty);
                } else {
                    if ($inventory->$kolomStok < $qty) {
                        return back()->with('error', 'Stok utama tidak mencukupi.');
                    }
                    $inventory->decrement($kolomStok, $qty);
                }
            }

            DB::commit();
            return back()->with('success', 'Stok berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }

    public function transferStock(Request $request, $slug)
    {
        $request->validate([
            'transfer_direction' => 'required|in:online_to_bazar,bazar_to_online',
            'qty' => 'required|numeric|min:1',
            'note' => 'required|string',
            'variant_id' => 'nullable|exists:product_variants,id'
        ]);

        $product = Product::where('slug', $slug)->firstOrFail();
        $qty = $request->qty;
        
        $fromLocation = $request->transfer_direction === 'online_to_bazar' ? 'Online' : 'Bazar';
        $toLocation   = $request->transfer_direction === 'online_to_bazar' ? 'Bazar' : 'Online';

        try {
            DB::beginTransaction();

            // === 1. KURANGI STOK DARI LOKASI ASAL ===
            if ($request->variant_id) {
                $variant = $product->variants()->findOrFail($request->variant_id);
                $fromColumn = $fromLocation == 'Online' ? 'stock_online' : 'stock_bazar';
                
                if ($variant->$fromColumn < $qty) {
                    return back()->with('error', "Stok varian di {$fromLocation} tidak mencukupi untuk dipindah.");
                }
                $variant->decrement($fromColumn, $qty);
                
                $toColumn = $toLocation == 'Online' ? 'stock_online' : 'stock_bazar';
                $variant->increment($toColumn, $qty);
            } else {
                $inventory = $product->inventory;
                $fromColumn = $fromLocation == 'Online' ? 'main_stock' : 'bazar_stock';
                
                if ($inventory->$fromColumn < $qty) {
                    return back()->with('error', "Stok utama di {$fromLocation} tidak mencukupi.");
                }
                $inventory->decrement($fromColumn, $qty);
                
                $toColumn = $toLocation == 'Online' ? 'main_stock' : 'bazar_stock';
                $inventory->increment($toColumn, $qty);
            }

            // === 2. CATAT KE RIWAYAT SEJARAH (2 ENTRI) ===
            // Catat Keluar
            $product->stockHistories()->create([
                'product_variant_id' => $request->variant_id,
                'user_id'            => auth()->id(),
                'type'               => 'Keluar',
                'location'           => $fromLocation,
                'qty'                => $qty,
                'note'               => "Mutasi Keluar ke {$toLocation} - " . $request->note,
            ]);

            // Catat Masuk
            $product->stockHistories()->create([
                'product_variant_id' => $request->variant_id,
                'user_id'            => auth()->id(),
                'type'               => 'Masuk',
                'location'           => $toLocation,
                'qty'                => $qty,
                'note'               => "Mutasi Masuk dari {$fromLocation} - " . $request->note,
            ]);

            DB::commit();
            return back()->with('success', 'Stok berhasil dipindahkan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }
}