<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Second_wareitems extends Model
{
    use HasFactory;

    protected $table='second_warehouse_items';

    
 
    protected $fillable = [   
        'store_id' ,
        'warehouse_id' ,
        'item_id',
        'available_qty'
    ];

}
