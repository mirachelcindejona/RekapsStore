<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Jalankan Permission Seeder Terlebih Dahulu
        $this->call([
            PermissionSeeder::class,
        ]);

        // 2. Buat Akun Admin (Ketua / Pengurus Utama)
        $admin = User::firstOrCreate(
            ['email' => 'admin@rekaps.com'],
            [
                'name'     => 'Admin Ekraf Himarpl',
                'username' => 'admin_ekraf',
                'password' => Hash::make('pass123'),
                // 'status' otomatis 'active' bawaan database
            ]
        );
        // Berikan Role Admin
        if (!$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }

        // 3. Buat Akun Customer Dummy
        $customer = User::firstOrCreate(
            ['email' => 'pembeli@rekaps.com'],
            [
                'name'     => 'Mahasiswa RPL',
                'username' => 'mahasiswa_rpl',
                'password' => Hash::make('pass123'),
            ]
        );
        // Berikan Role Customer
        if (!$customer->hasRole('customer')) {
            $customer->assignRole('customer');
        }

        // 4. Panggil Seeder Kategori dan Produk
        $this->call([
            CategoryProductSeeder::class,
            ProductSeeder::class,
            VoucherSeeder::class,
            ReviewSeeder::class,
        ]);

        $this->call([
            FinanceTransactionSeeder::class,
            NotificationSeeder::class,
        ]);
    }
}