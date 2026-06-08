<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\OnlineOrder;
use App\Models\OnlineOrderItem;
use App\Models\CashierOrder;
use App\Models\CashierOrderItem;
use Carbon\Carbon;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil data user dan product yang sudah ada di database
        $users = User::pluck('id')->toArray();
        $products = Product::all();

        // Jika tabel users atau products kosong, hentikan seeder
        if (empty($users) || $products->isEmpty()) {
            $this->command->warn('Tabel Users atau Products kosong! Buat datanya terlebih dahulu.');
            return;
        }

        $this->command->info('Mulai membuat dummy Pesanan Online...');

        /*  1. SEEDER PESANAN ONLINE */
        $onlineStatuses = ['Menunggu Proses Produksi', 'Sedang Diproduksi', 'Siap Diambil', 'Pesanan Selesai'];
        
        for ($i = 0; $i < 15; $i++) {
            $isLunas = $faker->boolean(70); // 70% kemungkinan lunas

            if ($isLunas) {
                $paymentStatus = 'Lunas';

                $status = $faker->randomElement([
                    'Menunggu Proses Produksi',
                    'Sedang Diproduksi',
                    'Siap Diambil',
                    'Pesanan Selesai'
                ]);
            } else {
                $paymentStatus = 'Pending';
                $status = 'Pending';
            }
            
            $onlineOrder = OnlineOrder::create([
                'user_id'        => $faker->randomElement($users),
                'order_code'     => 'ONL-' . strtoupper($faker->bothify('???####')),
                'subtotal'       => 0, // Akan dihitung setelah item masuk
                'discount'       => $faker->randomElement([0, 0, 5000, 10000]),
                'total'          => 0,
                'payment_method' => $faker->randomElement(['Transfer Bank', 'QRIS', 'E-Wallet']),
                'payment_status' => $paymentStatus,
                'snap_token'   => $isLunas ? null : 'https://payment-gateway.test/pay/' . $faker->uuid,
                'status'         => $status,
                'is_pinned'      => $faker->boolean(10),
                'created_at'     => Carbon::now()->subDays(rand(0, 30)), // Random tanggal 30 hari terakhir
                'updated_at'     => Carbon::now(),
            ]);

            $subtotal = 0;
            // Buat 1 sampai 3 item untuk setiap pesanan online
            $itemCount = rand(1, 3);
            for ($j = 0; $j < $itemCount; $j++) {
                $product = $products->random();
                $qty = rand(1, 5);
                $price = $product->price ?? $faker->numberBetween(15000, 75000); // Fallback harga
                $itemSubtotal = $price * $qty;

                OnlineOrderItem::create([
                    'online_order_id'    => $onlineOrder->id,
                    'product_id'         => $product->id,
                    'product_variant_id' => null,
                    'quantity'           => $qty,
                    'price'              => $price,
                    'subtotal'           => $itemSubtotal,
                    'notes'              => $faker->boolean(30) ? 'Tanpa pedas ya kak' : null,
                ]);

                $subtotal += $itemSubtotal;
            }

            // Update total harga pesanan online
            $onlineOrder->update([
                'subtotal' => $subtotal,
                'total'    => max(0, $subtotal - $onlineOrder->discount),
            ]);
        }


        $this->command->info('Mulai membuat dummy Pesanan Bazar...');

        /* 2. SEEDER PESANAN BAZAR (CASHIER) */
        $bazarStatuses = ['Proses', 'Selesai'];

        for ($k = 0; $k < 20; $k++) {
            $paymentMethod = $faker->randomElement(['Tunai', 'QRIS']);
            
            $bazarOrder = CashierOrder::create([
                // TAMBAHKAN BARIS INI UNTUK MENGATASI ERROR:
                'cashier_id'     => $faker->randomElement($users), 
                
                'order_code'     => 'BZR-' . strtoupper($faker->bothify('???####')),
                'customer_name'  => $faker->boolean(80) ? $faker->firstName : 'Umum',
                'subtotal'       => 0, 
                'discount'       => $faker->randomElement([0, 0, 0, 2000, 5000]),
                'total'          => 0,
                'payment_method' => $paymentMethod,
                'paid_amount'    => 0, 
                'change_amount'  => 0, 
                'status'         => $faker->randomElement($bazarStatuses),
                'created_at'     => Carbon::now()->subDays(rand(0, 30)),
                'updated_at'     => Carbon::now(),
            ]);

            $subtotalBazar = 0;
            // Buat 1 sampai 4 item untuk setiap pesanan bazar
            $itemBazarCount = rand(1, 4);
            for ($l = 0; $l < $itemBazarCount; $l++) {
                $product = $products->random();
                $qty = rand(1, 3);
                $price = $product->price ?? $faker->numberBetween(10000, 50000);
                $itemSubtotal = $price * $qty;

                CashierOrderItem::create([
                    'cashier_order_id' => $bazarOrder->id,
                    'product_id'       => $product->id,
                    'quantity'         => $qty,
                    'price'            => $price,
                    'subtotal'         => $itemSubtotal,
                    'notes'            => null,
                ]);

                $subtotalBazar += $itemSubtotal;
            }

            // Kalkulasi pembayaran
            $totalBazar = max(0, $subtotalBazar - $bazarOrder->discount);
            
            // Logika Uang Pas vs Kembalian untuk metode Tunai
            if ($paymentMethod == 'Tunai') {
                $paidAmount = $faker->boolean(50) ? $totalBazar : (ceil($totalBazar / 50000) * 50000); 
                $changeAmount = $paidAmount - $totalBazar;
            } else {
                $paidAmount = $totalBazar; // QRIS selalu pas
                $changeAmount = 0;
            }

            $bazarOrder->update([
                'subtotal'      => $subtotalBazar,
                'total'         => $totalBazar,
                'paid_amount'   => $paidAmount,
                'change_amount' => $changeAmount,
            ]);
        }

        $this->command->info('Seeder Pesanan Online & Bazar berhasil dijalankan! 🎉');
    }
}