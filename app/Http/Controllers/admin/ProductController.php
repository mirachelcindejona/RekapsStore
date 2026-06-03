<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Hitung total semua produk
        $totalProducts = Product::count();

        // Ambil data kategori beserta jumlah produk di masing-masing kategori
        $categories = CategoryProduct::withCount('products')->get();

        // Siapkan query produk utama (beserta relasi gambar, kategori, dan inventori)
        $query = Product::with(['category', 'inventory', 'images'])->latest();

        // Jika ada request filter kategori dari URL (?category=ID)
        if ($request->has('category') && $request->category != '') {
            $query->where('category_product_id', $request->category);
        }

        // Eksekusi query
        $products = $query->get();

        return view('admin.product', compact('products', 'categories', 'totalProducts'));
    }

    public function create()
    {
        // Ambil data kategori untuk ditampilkan di dropdown form
        $categories = CategoryProduct::all();
        return view('admin.product-add', compact('categories'));
    }

    public function store(Request $request)
    {
        // 1. Validasi Input dari Form
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

            // Cek & Simpan Varian atau Inventory Utama
            if ($request->has('variant_combo_names') && is_array($request->variant_combo_names) && count($request->variant_combo_names) > 0) {
                
                // Ambil Nama Induk (Misal: "Ukuran"), default 'Varian' jika kosong
                $masterName = $request->variant_master_name ?? 'Varian'; 
                
                $values = $request->variant_combo_names; // Array ["S", "M", "L"]
                $stocks = $request->variant_combo_stocks; // Array ["2", "10", "8"]

                foreach ($values as $index => $val) {
                    $stockOnline = isset($stocks[$index]) ? intval($stocks[$index]) : 0;

                    $product->variants()->create([
                        'variant_name'  => $masterName, // Menyimpan "Ukuran"
                        'variant_value' => $val,        // Menyimpan "S", "M", dst.
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
        // Cari berdasarkan slug, bukan findOrFail($id)
        $product = Product::with(['category', 'images', 'inventory', 'variants', 'stockHistories'])
                          ->where('slug', $slug)
                          ->firstOrFail();
        
        return view('admin.product-detail', compact('product'));
    }

    // Menampilkan Halaman Edit
    public function edit($slug)
    {
        $product = Product::with(['images', 'inventory', 'variants'])->where('slug', $slug)->firstOrFail();
        // ... return view edit ...
    }

    // Menghapus Produk
    public function destroy($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $product->delete();

        return redirect('/admin/product')->with('success', 'Produk berhasil dihapus!');
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
}