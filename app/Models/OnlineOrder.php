<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineOrder extends Model
{
    protected $table = 'online_orders';

    protected $fillable = [
        'user_id',
        'order_code',
        'subtotal',
        'discount',
        'total',
        'payment_method',
        'payment_status',
        'snap_token',
        'status',
        'is_pinned'
    ];

    public function items()
    {
        return $this->hasMany(OnlineOrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voucherUsage()
    {
        return $this->hasOne(VoucherUsage::class, 'order_id');
    }
}