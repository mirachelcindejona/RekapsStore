<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $customerId = DB::table('users')->where('email', 'pembeli@rekaps.com')->value('id');

        DB::table('notifications')->insert([
            [
                'user_id'    => $customerId,
                'title'      => 'Pesananmu sedang diproses',
                'message'    => 'Pesanan #ORD-001 sedang diproses oleh tim kami. Estimasi selesai 3 hari kerja.',
                'type'       => 'order',
                'link'       => '/profile/orders',
                'is_read'    => false,
                'created_at' => now()->subMinutes(5),
                'updated_at' => now()->subMinutes(5),
            ],
            [
                'user_id'    => $customerId,
                'title'      => 'Promo spesial buat kamu!',
                'message'    => 'Gunakan kode BAZAAR10 untuk diskon 10% di semua produk. Berlaku sampai akhir bulan.',
                'type'       => 'promo',
                'link'       => '/home',
                'is_read'    => false,
                'created_at' => now()->subHours(2),
                'updated_at' => now()->subHours(2),
            ],
            [
                'user_id'    => $customerId,
                'title'      => 'Selamat datang di Rekaps Store!',
                'message'    => 'Halo! Selamat datang di Rekaps Store. Temukan berbagai produk eksklusif dari komunitas RPL.',
                'type'       => 'info',
                'link'       => null,
                'is_read'    => true,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'user_id'    => $customerId,
                'title'      => 'Pembayaran berhasil dikonfirmasi',
                'message'    => 'Pembayaran pesanan #ORD-002 sebesar Rp150.000 telah berhasil dikonfirmasi.',
                'type'       => 'order',
                'link'       => '/profile/orders',
                'is_read'    => true,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'user_id'    => $customerId,
                'title'      => 'Produk baru tersedia!',
                'message'    => 'Hoodie RPL kini tersedia di Rekaps Store. Jangan sampai kehabisan!',
                'type'       => 'info',
                'link'       => '/home',
                'is_read'    => true,
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
        ]);
    }
}