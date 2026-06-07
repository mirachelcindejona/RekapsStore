<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
        ]);

        $admin = User::firstOrCreate(
            ['email' => 'admin@rekaps.com'],
            [
                'name'     => 'Admin Ekraf Himarpl',
                'username' => 'admin_ekraf',
                'password' => Hash::make('pass123'),
                // 'status' otomatis 'active' bawaan database
            ]
        );

        if (!$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }

        $customer = User::firstOrCreate(
            ['email' => 'pembeli@rekaps.com'],
            [
                'name'     => 'Mahasiswa RPL',
                'username' => 'mahasiswa_rpl',
                'password' => Hash::make('pass123'),
            ]
        );

        if (!$customer->hasRole('customer')) {
            $customer->assignRole('customer');
        }

        $this->call([
            CategoryProductSeeder::class,
            ProductSeeder::class,
            VoucherSeeder::class,
            ReviewSeeder::class,
            OrderSeeder::class,
        ]);

        $this->call([
            FinanceTransactionSeeder::class,
            NotificationSeeder::class,
        ]);
    }
}