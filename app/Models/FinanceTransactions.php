<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class FinanceTransactions extends Model
{
    protected $fillable = [
        'date',
        'description',
        'category',
        'type',
        'amount'
    ];

}
