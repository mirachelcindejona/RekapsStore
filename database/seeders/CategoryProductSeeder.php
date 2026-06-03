<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Merchandise', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Aksesoris', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Makanan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jasa', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Produk Digital', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Mencegah duplikasi jika dijalankan ulang
        foreach ($categories as $cat) {
            DB::table('categories_product')->updateOrInsert(
                ['name' => $cat['name']],
                $cat
            );
        }
    }
}