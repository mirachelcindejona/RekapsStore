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

            if ($request->has('variant_combo_names') && count($request->variant_combo_names) > 0) {
                
                $variantStocksInt = array_map('intval', $request->variant_combo_stocks);

                $product->variants()->create([
                    'variant_name'   => $request->variant_master_name ?? 'Varian Produk',
                    'variant_values' => $request->variant_combo_names,
                    'variant_stock'  => $variantStocksInt,
                ]);

                $totalMainStock = array_sum($variantStocksInt);
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
}