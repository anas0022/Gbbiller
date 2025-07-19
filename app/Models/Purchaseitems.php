<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchaseitems extends Model
{
    use HasFactory;

    protected $table ='purchaseitems';
    protected $fillable = [
        'item_id',
        'price_per_unit',
        'purchase_qty',
        'unit_total_cost',
        'bach_no',
        'expire_date',
        'note',
        'store_id',
        'unit_id',
        'purchase_id',
        'reference_no',
        'purchase_date',
        'purchase_status',
        'supplier_id',
        'other_charges_input',
        'other_charges_tax_id',
        'tax_id',
        'tax_amt',
        'discount_type',
        'hsn_code',
        'total_cost',
        'discount_amt'
    ];
}
