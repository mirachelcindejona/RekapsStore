<?php

namespace App\Models;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductVariant;

use Illuminate\Database\Eloquent\Model;

class StockHistory extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    

}