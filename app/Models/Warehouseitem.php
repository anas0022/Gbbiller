<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouseitem extends Model
{
    use HasFactory;
    protected $table='warehouse_items';

    
    protected $fillable = [   
        'store_id' ,
        'warehouse_id' ,
        'item_id',
        'available_qty'
    ];

}
