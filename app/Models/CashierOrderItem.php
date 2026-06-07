<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FinanceTransactions;

class CashierOrderItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi ke Order Utama
    public function order()
    {
        return $this->belongsTo(CashierOrder::class, 'cashier_order_id');
    }

    // Relasi ke Produk Master
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Relasi ke Varian (Jika ada)
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
}