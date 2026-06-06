<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('discounts', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->enum('type', [
                'percentage',
                'fixed'
            ]);

            $table->decimal('value', 10, 2);

            $table->decimal('min_purchase', 10, 2)
                ->default(0);

            $table->integer('quota');

            $table->integer('used_quota')
                ->default(0);

            $table->date('start_date');

            $table->date('end_date');

            $table->enum('status', [
                'Aktif',
                'Non-Aktif'
            ])->default('Aktif');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};