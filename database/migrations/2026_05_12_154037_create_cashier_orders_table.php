<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cashier_orders', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel users (karena kasir adalah user)
            $table->foreignId('cashier_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('order_code', 50)->unique();
            $table->string('pg_transaction_id')->nullable();
            $table->string('customer_name', 100)->nullable()->default('Umum');
            $table->decimal('subtotal', 15, 2)->default(0);
            $table->decimal('discount', 15, 2)->default(0);
            $table->decimal('total', 15, 2)->default(0);
            $table->enum('payment_method', ['Tunai', 'QRIS'])->default('Tunai');
            $table->enum('payment_status', ['Unpaid', 'Paid', 'Failed'])->default('Unpaid');
            $table->decimal('paid_amount', 15, 2)->default(0);
            $table->decimal('change_amount', 15, 2)->default(0);
            $table->text('payment_link')->nullable();
            $table->enum('status', ['Proses', 'Selesai'])->default('Proses');
            $table->boolean('is_pinned')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashier_orders');
    }
};