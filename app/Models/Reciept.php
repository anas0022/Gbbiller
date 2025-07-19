<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reciept extends Model
{
    use HasFactory;
    protected $table = 'reciepts';
    protected $fillable = [
        'date',
        'customer_name',
        'against_bill',
        'amount',
        'remarks',
        'reciept_no',
        'created_by'
    ];

  
}
