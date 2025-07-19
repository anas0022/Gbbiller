<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchase_order_sales_items extends Model
{
    use HasFactory;

    protected $table = 'purchase_order_sales_items';

    protected $fillable = [
        'item_id',
        'item_name',
        'grand_total',
        'part_no',
        'show_part',
        'rate_inclusive_tax',
        'sales_qty',
        'purchase_price',
        'price_per_unit',
        'total_cost',
        'sales_id',
        'hsn_code',
        'tax_id',
        'tax_amt',
        'unit_id',
        'mrp',
        'discount_amt',
        'sales_id',
        'store_id',
        'customer_id',
        'description'
    ];
}
