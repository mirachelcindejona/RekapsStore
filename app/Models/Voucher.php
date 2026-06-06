<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'voucher';

    public function usages()
    {
        return $this->hasMany(VoucherUsage::class);
    }
}