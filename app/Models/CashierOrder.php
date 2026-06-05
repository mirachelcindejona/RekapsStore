<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashierOrder extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi ke User (Kasir yang bertugas)
    public function cashier()
    {
        return $this->belongsTo(User::class, 'cashier_id');
    }

    // Relasi ke Item Pesanan
    public function items()
    {
        return $this->hasMany(CashierOrderItem::class, 'cashier_order_id');
    }

    // Format Rupiah (Helper)
    public function getFormattedTotalAttribute()
    {
        return 'Rp ' . number_format($this->total, 0, ',', '.');
    }

    // Generate Nomor Invoice / TRX Code (Format: TRX-BZR-260512-001)
    public static function generateOrderCode()
    {
        $date = now()->format('ymd');
        $lastOrder = self::whereDate('created_at', now()->toDateString())->latest('id')->first();

        if (!$lastOrder) {
            $sequence = '001';
        } else {
            // Ambil 3 digit terakhir dan tambah 1
            $lastSequence = (int) substr($lastOrder->order_code, -3);
            $sequence = str_pad($lastSequence + 1, 3, '0', STR_PAD_LEFT);
        }

        return 'TRX-BZR-' . $date . '-' . $sequence;
    }
}