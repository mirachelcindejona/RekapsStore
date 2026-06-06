<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'dashboard',
            'produk',
            'pesanan',
            'keuangan',
            'diskon',
            'pengguna',
            'laporan',
            'kasir',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Buat Role dan langsung tempelkan semua permission ke Admin
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo($permissions);

        Role::firstOrCreate(['name' => 'pengurus']);
        Role::firstOrCreate(['name' => 'customer']);
    }
}