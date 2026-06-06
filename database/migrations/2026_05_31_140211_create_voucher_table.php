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
        Schema::create('voucher', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->string('type')->default('percentage'); // percentage / fixed
            $table->decimal('value', 15, 2)->default(0);
            $table->decimal('min_purchase', 15, 2)->default(0);
            $table->integer('quota')->default(1);
            $table->integer('used_quota')->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('status', ['Aktif', 'Non-Aktif'])->default('Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher');
    }
};
