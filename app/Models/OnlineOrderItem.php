<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineOrderItem extends Model
{
    protected $table = 'online_order_items';
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(OnlineOrder::class, 'online_order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
}