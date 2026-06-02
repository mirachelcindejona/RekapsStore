<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\StockHistory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Admin Pengurus
        $admin = User::create([
            'name' => 'Admin Ekraf Himarpl',
            'email' => 'admin@rekaps.com',
            'password' => Hash::make('password123'),
        ]);

        // 2. Buat Kategori Produk
        $catMerch = CategoryProduct::create(['name' => 'Merchandise']);
        $catMakanan = CategoryProduct::create(['name' => 'Makanan & Minuman']);
        $catJasa = CategoryProduct::create(['name' => 'Jasa']);

        // =========================================================================
        // PRODUK 1: ADA VARIAN (Contoh: Jersey)
        // =========================================================================
        $jersey = Product::create([
            'category_product_id' => $catMerch->id,
            'name' => 'Jersey RPL Super Premium',
            'slug' => Str::slug('Jersey RPL Super Premium'),
            'product_code' => 'MERCH-001',
            'product_type' => 'Ready Stok',
            'selling_price' => 140000,
            'cost_price' => 130000,
            'description' => 'Jersey kebanggaan mahasiswa RPL. Bahan dryfit premium, full printing sublimasi anti luntur.',
            'status' => 'Aktif',
            'pickup_info' => 'Diambil di Sekre Himarpl jam 15.00 WIB.',
        ]);

        // TAMBAHKAN DATA GAMBAR DUMMY (Menghubungkan ke tabel product_images)
        // Menyimpan path yang nantinya diakses via asset('storage/' . $path)
        $jersey->images()->createMany([
            ['image_path' => 'product_images/poster-jersey.png'],
            ['image_path' => 'product_images/jersey.png'],
            ['image_path' => 'product_images/jersey-size.png'],
        ]);

        // Buat Baris Varian Relasional (variant_name & variant_value)
        $variantM = ProductVariant::create([
            'product_id'    => $jersey->id,
            'variant_name'  => 'Ukuran',
            'variant_value' => 'M',
            'stock_online'  => 10,
            'stock_bazar'   => 5,
        ]);
        
        $variantL = ProductVariant::create([
            'product_id'    => $jersey->id,
            'variant_name'  => 'Ukuran',
            'variant_value' => 'L',
            'stock_online'  => 8,
            'stock_bazar'   => 2,
        ]);

        // Catat Riwayat Mutasi Stok Awal Jersey
        StockHistory::create([
            'product_id'         => $jersey->id,
            'product_variant_id' => $variantM->id,
            'user_id'            => $admin->id,
            'type'               => 'Masuk',
            'location'           => 'Online',
            'qty'                => 10,
            'note'               => 'Stok awal ukuran M dari vendor',
        ]);

        StockHistory::create([
            'product_id'         => $jersey->id,
            'product_variant_id' => $variantL->id,
            'user_id'            => $admin->id,
            'type'               => 'Masuk',
            'location'           => 'Online',
            'qty'                => 8,
            'note'               => 'Stok awal ukuran L dari vendor',
        ]);


        // =========================================================================
        // PRODUK 2: TANPA VARIAN (Contoh: Produk Makanan)
        // =========================================================================
        $cejeco = Product::create([
            'category_product_id' => $catMakanan->id,
            'name' => 'Keripik Pisang Lumer Cejeco',
            'slug' => Str::slug('Keripik Pisang Lumer Cejeco'),
            'product_code' => 'FOOD-001',
            'product_type' => 'Ready Stok',
            'selling_price' => 15000,
            'cost_price' => 10000,
            'description' => 'Keripik pisang renyah dengan balutan cokelat lumer yang melimpah. Cocok untuk ngemil saat ngoding!',
            'status' => 'Aktif',
            'pickup_info' => 'Bisa COD area kampus UPI Cibiru.',
        ]);

        // TAMBAHKAN GAMBAR UNTUK CEJECO
        $cejeco->images()->create([
            'image_path' => 'product_images/cejeco-banner.png'
        ]);

        // Simpan ke tabel inventory utama karena produk tunggal
        $cejeco->inventory()->create([
            'main_stock' => 50,
            'bazar_stock' => 20,
        ]);

        // Catat Riwayat Mutasi Stok Keripik
        StockHistory::create([
            'product_id' => $cejeco->id,
            'user_id'    => $admin->id,
            'type'       => 'Masuk',
            'location'   => 'Online',
            'qty'        => 50,
            'note'       => 'Produksi batch pertama',
        ]);


        // =========================================================================
        // PRODUK 3: JASA (Tidak butuh stok fisik)
        // =========================================================================
        $jasa = Product::create([
            'category_product_id' => $catJasa->id,
            'name' => 'Jasa Install Ulang Laptop',
            'slug' => Str::slug('Jasa Install Ulang Laptop'),
            'product_code' => 'SERV-001',
            'product_type' => 'Jasa',
            'selling_price' => 50000,
            'cost_price' => 0,
            'description' => 'Install ulang Windows 10/11, lengkap dengan Office dan aktivasi. Proses pengerjaan 1 hari.',
            'status' => 'Aktif',
            'pickup_info' => 'Serahkan laptop ke Sekre.',
        ]);

        // TAMBAHKAN GAMBAR UNTUK JASA
        $jasa->images()->create([
            'image_path' => 'product_images/service-laptop.png'
        ]);
    }
}