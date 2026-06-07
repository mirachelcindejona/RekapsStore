<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Kolom id dijaga, kolom lainnya bebas diisi (Mass Assignment)
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'product_id');
    }

    public function stockHistories()
    {
        return $this->hasMany(StockHistory::class, 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    // Menghitung Total Stok Bazar (Gabungan stok utama bazar + varian bazar)
    public function getTotalBazarStockAttribute()
    {
        if ($this->variants()->exists()) {
            return $this->variants()->sum('stock_bazar');
        }
        
        return $this->inventory ? $this->inventory->bazar_stock : 0;
    }
}