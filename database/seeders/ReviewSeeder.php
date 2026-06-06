<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat beberapa user tambahan khusus untuk pemberi ulasan
        $user1 = User::firstOrCreate(
            ['email' => 'sumbul@rekaps.com'],
            ['name' => 'Muhammad Sumbul', 'username' => 'sumbul_m', 'password' => Hash::make('password')]
        );
        
        $user2 = User::firstOrCreate(
            ['email' => 'sarwenah@rekaps.com'],
            ['name' => 'Uum Sarwenah', 'username' => 'uum_s', 'password' => Hash::make('password')]
        );
        
        $user3 = User::firstOrCreate(
            ['email' => 'akusiapa@rekaps.com'],
            ['name' => 'Aku Siapa', 'username' => 'aku_siapa', 'password' => Hash::make('password')]
        );

        // Berikan role customer ke mereka (opsional tapi disarankan)
        foreach ([$user1, $user2, $user3] as $user) {
            if (!$user->hasRole('customer')) {
                $user->assignRole('customer');
            }
        }

        // 2. Ambil produk Jersey RPL Pink untuk disuntikkan ulasan sesuai desain UI
        $jersey = Product::where('slug', 'jersey-rpl-pink')->first();

        if ($jersey) {
            DB::table('reviews')->insert([
                [
                    'product_id'  => $jersey->id,
                    'user_id'     => $user1->id,
                    'rating'      => 5,
                    'comment'     => 'Jerseynya bagus bangett minn bikin lagi yang lebih gacorrrrr😍😍',
                    'admin_reply' => 'Makasii udah memesan di rekaps store tunggu produk gacor lainnya yaaa',
                    'created_at'  => now()->subDays(2),
                    'updated_at'  => now()->subDays(2),
                ],
                [
                    'product_id'  => $jersey->id,
                    'user_id'     => $user2->id,
                    'rating'      => 5,
                    'comment'     => 'Kerennnnn bahannya adem dan premium wakkk🔥🔥🔥🔥',
                    'admin_reply' => null,
                    'created_at'  => now()->subDays(1),
                    'updated_at'  => now()->subDays(1),
                ],
                [
                    'product_id'  => $jersey->id,
                    'user_id'     => $user3->id,
                    'rating'      => 4,
                    'comment'     => 'Baguss bangetttt tapi sayang PO nya aga lama yahhh',
                    'admin_reply' => null,
                    'created_at'  => now()->subHours(5),
                    'updated_at'  => now()->subHours(5),
                ],
            ]);
        }

        // 3. (Opsional) Tambahkan ulasan acak untuk beberapa produk lain agar toko terlihat ramai
        $otherProducts = Product::where('slug', '!=', 'jersey-rpl-pink')->inRandomOrder()->take(5)->get();
        $randomComments = [
            'Kualitas mantap, sesuai ekspektasi!',
            'Pengiriman cepat, admin ramah.',
            'Bagus, tapi ukurannya agak kebesaran di saya.',
            'Recommended banget buat anak-anak RPL.',
            'Harga mahasiswa kualitas dewa!'
        ];

        foreach ($otherProducts as $index => $product) {
            DB::table('reviews')->insert([
                'product_id'  => $product->id,
                'user_id'     => $user1->id, // Pinjam user1 untuk ulasan acak
                'rating'      => rand(4, 5),
                'comment'     => $randomComments[$index],
                'admin_reply' => rand(0, 1) ? 'Terima kasih atas ulasannya!' : null,
                'created_at'  => now()->subDays(rand(1, 10)),
                'updated_at'  => now()->subDays(rand(1, 10)),
            ]);
        }
    }
}