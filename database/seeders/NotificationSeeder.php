<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $customerId = DB::table('users')
            ->where('email', 'pembeli@rekaps.com')
            ->value('id');

        $pinkJersey = DB::table('products')
            ->where('name', 'like', '%Pink%')
            ->value('id');

        $blueJersey = DB::table('products')
            ->where('name', 'like', '%Blue%')
            ->value('id');

        DB::table('notifications')->insert([
            [
                'user_id'    => $customerId,
                'product_id' => null,
                'title'      => 'Admin Rekaps',
                'message'    => 'Halo! Jangan lupa diambil ya pesanannya. Kami standby di tempat dari jam 10 pagi sampai jam 3 sore, setelah itu akan kami lanjut besok hari di tempat yang sama.',
                'type'       => 'info',
                'link'       => null,
                'is_read'    => false,
                'created_at' => now()->subMinutes(15),
                'updated_at' => now()->subMinutes(15),
            ],

            [
                'user_id'    => $customerId,
                'product_id' => $pinkJersey,
                'title'      => 'Pesananmu sudah bisa kamu ambil',
                'message'    => 'Segera ambil pesananmu pada lokasi yang telah ditentukan.',
                'type'       => 'order',
                'link'       => '/profile/orders',
                'is_read'    => true,
                'created_at' => now()->subMinutes(23),
                'updated_at' => now()->subMinutes(23),
            ],

            [
                'user_id'    => $customerId,
                'product_id' => $blueJersey,
                'title'      => 'Pesananmu berhasil dibuat',
                'message'    => 'Terima kasih atas pesananmu! Kami akan segera memberikan informasi ketika pesanan siap diambil. Mohon tunggu, ya!',
                'type'       => 'order',
                'link'       => '/profile/orders',
                'is_read'    => true,
                'created_at' => now()->subHour(),
                'updated_at' => now()->subHour(),
            ],

            [
                'user_id'    => $customerId,
                'product_id' => $pinkJersey,
                'title'      => 'Pesananmu sudah bisa kamu ambil',
                'message'    => 'Segera ambil pesananmu pada lokasi yang telah ditentukan.',
                'type'       => 'order',
                'link'       => '/profile/orders',
                'is_read'    => true,
                'created_at' => now()->subMonths(2),
                'updated_at' => now()->subMonths(2),
            ],

            [
                'user_id'    => $customerId,
                'product_id' => null,
                'title'      => 'Admin Rekaps',
                'message'    => 'Halo! Jangan lupa diambil ya pesanannya. Kami standby di tempat dari jam 10 pagi sampai jam 3 sore, setelah itu akan kami lanjut besok hari di tempat yang sama.',
                'type'       => 'info',
                'link'       => null,
                'is_read'    => true,
                'created_at' => now()->subMonths(4),
                'updated_at' => now()->subMonths(4),
            ],
        ]);
    }
}