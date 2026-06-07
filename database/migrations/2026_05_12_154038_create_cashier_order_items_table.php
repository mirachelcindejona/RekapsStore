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
        Schema::create('cashier_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cashier_order_id')->constrained('cashier_orders')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('restrict');
            
            // Nullable karena tidak semua produk punya varian (misal: Basreng tidak punya varian ukuran)
            $table->foreignId('product_variant_id')->nullable()->constrained('product_variants')->onDelete('restrict');
            
            $table->integer('quantity');
            $table->decimal('price', 15, 2);
            $table->decimal('subtotal', 15, 2);
            $table->text('notes')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashier_order_items');
    }
};