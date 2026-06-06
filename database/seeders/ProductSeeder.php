<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $merchandise = DB::table('categories_product')->where('name', 'Merchandise')->value('id');
        $aksesoris   = DB::table('categories_product')->where('name', 'Aksesoris')->value('id');
        $makanan     = DB::table('categories_product')->where('name', 'Makanan')->value('id');
        $jasa        = DB::table('categories_product')->where('name', 'Jasa')->value('id');
        $digital     = DB::table('categories_product')->where('name', 'Produk Digital')->value('id');

        // Ambil ID Admin untuk pencatatan riwayat stok
        $adminId = User::where('email', 'admin@rekaps.com')->value('id') ?? 1;

        $products = [
            [
                'category_product_id' => $merchandise, 'name' => 'Jersey RPL Pink', 'slug' => 'jersey-rpl-pink',
                'description' => 'Jersey RPL Pink merupakan produk apparel unggulan untuk komunitas RPL.',
                'product_code' => 'PRD-001', 'product_type' => 'Ready Stok', 'is_processed' => true,
                'estimation' => null, 'pickup_info' => null, 'cost_price' => 100000, 'selling_price'=> 150000,
                'discount' => 20, 'status' => 'Aktif',
            ],
            [
                'category_product_id' => $aksesoris, 'name' => 'Stiker Minnix Series', 'slug' => 'stiker-minnix-series',
                'description' => 'Stiker karakter eksklusif dengan desain lucu dan unik.',
                'product_code' => 'PRD-002', 'product_type' => 'Ready Stok', 'is_processed' => false,
                'estimation' => null, 'pickup_info' => null, 'cost_price' => 5000, 'selling_price'=> 10000,
                'discount' => 0, 'status' => 'Aktif',
            ],
            [
                'category_product_id' => $merchandise, 'name' => 'Work Jacket RPL', 'slug' => 'work-jacket-rpl',
                'description' => 'Work Jacket RPL dengan desain casual modern.',
                'product_code' => 'PRD-003', 'product_type' => 'Ready Stok', 'is_processed' => true,
                'estimation' => null, 'pickup_info' => null, 'cost_price' => 180000, 'selling_price'=> 230000,
                'discount' => 10, 'status' => 'Aktif',
            ],
            [
                'category_product_id' => $makanan, 'name' => 'Snack Rekaps Box', 'slug' => 'snack-rekaps-box',
                'description' => 'Kotak snack eksklusif khas event Rekaps, isi beragam camilan pilihan.',
                'product_code' => 'PRD-004', 'product_type' => 'PO', 'is_processed' => true,
                'estimation' => '3 hari kerja', 'pickup_info' => 'Ambil di sekretariat RPL', 'cost_price' => 20000, 'selling_price'=> 35000,
                'discount' => 0, 'status' => 'Aktif',
            ],
            [
                'category_product_id' => $merchandise, 'name' => 'Jersey RPL Sky Blue', 'slug' => 'jersey-rpl-sky-blue',
                'description' => 'Jersey RPL Sky Blue dengan warna biru langit yang elegan.',
                'product_code' => 'PRD-005', 'product_type' => 'Ready Stok', 'is_processed' => true,
                'estimation' => null, 'pickup_info' => null, 'cost_price' => 100000, 'selling_price'=> 150000,
                'discount' => 30, 'status' => 'Aktif',
            ],
            [
                'category_product_id' => $digital, 'name' => 'Template CV Rekaps', 'slug' => 'template-cv-rekaps',
                'description' => 'Template CV profesional desain eksklusif dari tim Rekaps.',
                'product_code' => 'PRD-006', 'product_type' => 'Ready Stok', 'is_processed' => false,
                'estimation' => null, 'pickup_info' => null, 'cost_price' => 5000, 'selling_price'=> 15000,
                'discount' => 0, 'status' => 'Aktif',
            ],
            [
                'category_product_id' => $aksesoris, 'name' => 'Stiker Devoria Series', 'slug' => 'stiker-devoria-series',
                'description' => 'Stiker aesthetic dan modern untuk mempercantik barang favoritmu.',
                'product_code' => 'PRD-007', 'product_type' => 'Ready Stok', 'is_processed' => false,
                'estimation' => null, 'pickup_info' => null, 'cost_price' => 5000, 'selling_price'=> 10000,
                'discount' => 0, 'status' => 'Aktif',
            ],
            [
                'category_product_id' => $jasa, 'name' => 'Jasa Desain Poster', 'slug' => 'jasa-desain-poster',
                'description' => 'Jasa pembuatan desain poster event, organisasi, atau keperluan pribadi.',
                'product_code' => 'PRD-008', 'product_type' => 'Jasa', 'is_processed' => true,
                'estimation' => '5 hari kerja', 'pickup_info' => null, 'cost_price' => 30000, 'selling_price'=> 75000,
                'discount' => 15, 'status' => 'Aktif',
            ],
            [
                'category_product_id' => $merchandise, 'name' => 'Tote Bag RPL', 'slug' => 'tote-bag-rpl',
                'description' => 'Tote bag kanvas premium dengan logo RPL.',
                'product_code' => 'PRD-009', 'product_type' => 'PO', 'is_processed' => true,
                'estimation' => '7 hari kerja', 'pickup_info' => 'Ambil di sekretariat RPL', 'cost_price' => 25000, 'selling_price'=> 55000,
                'discount' => 0, 'status' => 'Aktif',
            ],
            [
                'category_product_id' => $aksesoris, 'name' => 'Gantungan Kunci RPL', 'slug' => 'gantungan-kunci-rpl',
                'description' => 'Gantungan kunci akrilik dengan logo RPL, ringan dan tahan lama.',
                'product_code' => 'PRD-010', 'product_type' => 'Ready Stok', 'is_processed' => false,
                'estimation' => null, 'pickup_info' => null, 'cost_price' => 8000, 'selling_price'=> 20000,
                'discount' => 10, 'status' => 'Aktif',
            ],
            [
                'category_product_id' => $makanan, 'name' => 'Minuman Boba Rekaps', 'slug' => 'minuman-boba-rekaps',
                'description' => 'Minuman boba segar khas event Rekaps dengan berbagai pilihan rasa.',
                'product_code' => 'PRD-011', 'product_type' => 'Ready Stok', 'is_processed' => false,
                'estimation' => null, 'pickup_info' => 'Ambil langsung di booth', 'cost_price' => 8000, 'selling_price'=> 18000,
                'discount' => 0, 'status' => 'Aktif',
            ],
            [
                'category_product_id' => $digital, 'name' => 'E-Book Panduan PKL', 'slug' => 'ebook-panduan-pkl',
                'description' => 'E-book lengkap panduan PKL untuk mahasiswa RPL.',
                'product_code' => 'PRD-012', 'product_type' => 'Ready Stok', 'is_processed' => false,
                'estimation' => null, 'pickup_info' => null, 'cost_price' => 10000, 'selling_price'=> 25000,
                'discount' => 20, 'status' => 'Aktif',
            ],
            [
                'category_product_id' => $jasa, 'name' => 'Jasa Pembuatan Website', 'slug' => 'jasa-pembuatan-website',
                'description' => 'Jasa pembuatan website company profile, portofolio, atau toko online.',
                'product_code' => 'PRD-013', 'product_type' => 'Jasa', 'is_processed' => true,
                'estimation' => '14 hari kerja', 'pickup_info' => null, 'cost_price' => 200000, 'selling_price'=> 500000,
                'discount' => 10, 'status' => 'Aktif',
            ],
            [
                'category_product_id' => $merchandise, 'name' => 'Hoodie RPL', 'slug' => 'hoodie-rpl',
                'description' => 'Hoodie RPL bahan fleece premium, hangat dan nyaman.',
                'product_code' => 'PRD-014', 'product_type' => 'PO', 'is_processed' => true,
                'estimation' => '10 hari kerja', 'pickup_info' => 'Ambil di sekretariat RPL', 'cost_price' => 120000, 'selling_price'=> 250000,
                'discount' => 5, 'status' => 'Aktif',
            ],
            [
                'category_product_id' => $aksesoris, 'name' => 'Pin Enamel RPL', 'slug' => 'pin-enamel-rpl',
                'description' => 'Pin enamel eksklusif dengan desain logo RPL.',
                'product_code' => 'PRD-015', 'product_type' => 'Ready Stok', 'is_processed' => false,
                'estimation' => null, 'pickup_info' => null, 'cost_price' => 10000, 'selling_price'=> 25000,
                'discount' => 0, 'status' => 'Aktif',
            ],
        ];

        // LOGIKA BARU: Bisa menerima Array untuk Multi-Gambar
        $images = [
            'jersey-rpl-pink' => [
                'product_images/poster-jersey.png',
                'product_images/jersey.png',
                'product_images/poster-jersey.png',
                'product_images/jersey.png',
            ],

            'stiker-minnix-series' => [
                'product_images/stiker1.png',
                'product_images/stiker2.png',
                'product_images/stiker1.png',
                'product_images/stiker2.png',
            ],

            'work-jacket-rpl' => [
                'product_images/workjacket.png',
                'product_images/workjacket.png',
                'product_images/workjacket.png',
                'product_images/workjacket.png',
            ],

            'snack-rekaps-box' => [
                'product_images/stiker1.png',
                'product_images/stiker2.png',
                'product_images/stiker1.png',
                'product_images/stiker2.png',
            ],

            'jersey-rpl-sky-blue' => [
                'product_images/skyjersey.png',
                'product_images/skyjersey.png',
                'product_images/skyjersey.png',
                'product_images/skyjersey.png',
            ],

            'template-cv-rekaps' => [
                'product_images/stiker2.png',
                'product_images/stiker1.png',
                'product_images/stiker2.png',
                'product_images/stiker1.png',
            ],

            'stiker-devoria-series' => [
                'product_images/stiker2.png',
                'product_images/stiker1.png',
                'product_images/stiker2.png',
                'product_images/stiker1.png',
            ],

            'jasa-desain-poster' => [
                'product_images/stiker1.png',
                'product_images/stiker2.png',
                'product_images/stiker1.png',
                'product_images/stiker2.png',
            ],

            'tote-bag-rpl' => [
                'product_images/workjacket.png',
                'product_images/workjacket.png',
                'product_images/workjacket.png',
                'product_images/workjacket.png',
            ],

            'gantungan-kunci-rpl' => [
                'product_images/stiker2.png',
                'product_images/stiker1.png',
                'product_images/stiker2.png',
                'product_images/stiker1.png',
            ],

            'minuman-boba-rekaps' => [
                'product_images/stiker1.png',
                'product_images/stiker2.png',
                'product_images/stiker1.png',
                'product_images/stiker2.png',
            ],

            'ebook-panduan-pkl' => [
                'product_images/stiker2.png',
                'product_images/stiker1.png',
                'product_images/stiker2.png',
                'product_images/stiker1.png',
            ],

            'jasa-pembuatan-website' => [
                'product_images/stiker1.png',
                'product_images/stiker2.png',
                'product_images/stiker1.png',
                'product_images/stiker2.png',
            ],

            'hoodie-rpl' => [
                'product_images/workjacket.png',
                'product_images/workjacket.png',
                'product_images/workjacket.png',
                'product_images/workjacket.png',
            ],

            'pin-enamel-rpl' => [
                'product_images/stiker2.png',
                'product_images/stiker1.png',
                'product_images/stiker2.png',
                'product_images/stiker1.png',
            ],
        ];

        $variants = [
            'jersey-rpl-pink'     => ['S', 'M', 'L', 'XL', 'XXL'],
            'jersey-rpl-sky-blue' => ['S', 'M', 'L', 'XL', 'XXL'],
            'work-jacket-rpl'     => ['M', 'L', 'XL', 'XXL'],
            'tote-bag-rpl'        => ['One Size'],
            'hoodie-rpl'          => ['S', 'M', 'L', 'XL', 'XXL'],
        ];

        foreach ($products as $productData) {
            // 1. Simpan Produk
            $product = Product::create($productData);

            // 2. Simpan Gambar Produk (Otomatis mendeteksi Array atau String)
            if (isset($images[$product->slug])) {
                $imagePaths = is_array($images[$product->slug]) ? $images[$product->slug] : [$images[$product->slug]];
                
                foreach ($imagePaths as $path) {
                    $product->images()->create([
                        'image_path' => $path,
                    ]);
                }
            }

            // Variabel untuk sinkronisasi total stok ke tabel Inventories
            $totalOnlineStock = 0;
            $totalBazarStock = 0;

            // 3. Simpan Varian & Kalkulasi Total Stok
            if (isset($variants[$product->slug])) {
                foreach ($variants[$product->slug] as $size) {
                    $variantOnlineStock = 10;
                    $variantBazarStock = 5;
                    $variant = $product->variants()->create([
                        'variant_name'  => 'Ukuran',
                        'variant_value' => $size,
                        'stock_online'  => $variantOnlineStock,
                        'stock_bazar'   => $variantBazarStock,
                    ]);

                    // Tambahkan ke total sinkronisasi
                    $totalOnlineStock += $variantOnlineStock;
                    $totalBazarStock += $variantBazarStock;

                    // Catat Riwayat Stok
                    $product->stockHistories()->create([
                        'product_variant_id' => $variant->id,
                        'user_id'            => $adminId,
                        'type'               => 'Masuk',
                        'location'           => 'Online',
                        'qty'                => $variantOnlineStock,
                        'note'               => "Stok awal varian $size (Online) dari Seeder",
                    ]);
                    
                    $product->stockHistories()->create([
                        'product_variant_id' => $variant->id,
                        'user_id'            => $adminId,
                        'type'               => 'Masuk',
                        'location'           => 'Bazar',
                        'qty'                => $variantBazarStock,
                        'note'               => "Stok awal varian $size (Bazar) dari Seeder",
                    ]);
                }
            } else {
                // JIKA PRODUK TUNGGAL (Tanpa Varian)
                if (!in_array($product->category_product_id, [$jasa, $digital])) {
                    $totalOnlineStock = 50;
                    $totalBazarStock = 10;

                    $product->stockHistories()->create([
                        'user_id'  => $adminId,
                        'type'     => 'Masuk',
                        'location' => 'Online',
                        'qty'      => $totalOnlineStock,
                        'note'     => 'Stok awal Online dari Seeder',
                    ]);
                    
                    $product->stockHistories()->create([
                        'user_id'  => $adminId,
                        'type'     => 'Masuk',
                        'location' => 'Bazar',
                        'qty'      => $totalBazarStock,
                        'note'     => 'Stok awal Bazar dari Seeder',
                    ]);
                }
            }

            // 4. SINKRONISASI KE TABEL INVENTORY UNTUK SEMUA PRODUK
            // Tabel ini sekarang akan berisi total dari seluruh varian, ATAU stok murni jika tidak ada varian.
            $product->inventory()->create([
                'main_stock'  => $totalOnlineStock,
                'bazar_stock' => $totalBazarStock,
            ]);
        }
    }
}