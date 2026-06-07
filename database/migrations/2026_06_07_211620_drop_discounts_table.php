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
    Schema::dropIfExists('discounts');
}

public function down(): void
{
    // kalau mau rollback bisa buat ulang tabelnya di sini
}
};
