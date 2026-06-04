<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinanceTransactionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('finance_transactions')->insert([
            [
                'date' => '2026-03-30',
                'description' => 'Penjualan Bazar Kampus',
                'category' => 'Proker Bazar',
                'type' => 'Pemasukan',
                'amount' => 2400000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'date' => '2026-03-28',
                'description' => 'Cetak Banner Acara',
                'category' => 'Operasional',
                'type' => 'Pengeluaran',
                'amount' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'date' => '2026-03-25',
                'description' => 'Sponsorship Seminar',
                'category' => 'Sponsorship',
                'type' => 'Pemasukan',
                'amount' => 5000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}