<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Semua Permission
        $permissions = [
            'dashboard',
            'produk',
            'pesanan',
            'keuangan',
            'diskon',
            'pengguna',
            'laporan',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // 2. Buat Role dan langsung tempelkan semua permission ke Admin
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo($permissions);

        Role::firstOrCreate(['name' => 'pengurus']);
        Role::firstOrCreate(['name' => 'customer']);
    }
}