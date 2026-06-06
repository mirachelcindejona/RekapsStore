<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('voucher')->insert([
            [
                'code'         => 'BAZAAR10',
                'type'         => 'percentage',
                'value'        => 10,
                'min_purchase' => 50000,
                'quota'        => 100,
                'used_quota'   => 0,
                'start_date'   => '2026-01-01',
                'end_date'     => '2026-12-31',
                'status'       => 'Aktif',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'code'         => 'DIESNAT5',
                'type'         => 'percentage',
                'value'        => 5,
                'min_purchase' => 30000,
                'quota'        => 50,
                'used_quota'   => 0,
                'start_date'   => '2026-01-01',
                'end_date'     => '2026-12-31',
                'status'       => 'Aktif',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'code'         => 'EXPIRED15',
                'type'         => 'percentage',
                'value'        => 15,
                'min_purchase' => 100000,
                'quota'        => 30,
                'used_quota'   => 30,
                'start_date'   => '2025-01-01',
                'end_date'     => '2025-12-31',
                'status'       => 'Non-Aktif',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);
    }
}