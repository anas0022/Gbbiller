<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Closing extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'invoice_count',
        'total_sale',
        'total_expense',
        'closing_amount',
        'opening_balance',
        'prefix',
        'closing_code',
        'purchase_count',
        'total_purchase',
        'store_id'
    ];

    protected $table = 'closing';
}
