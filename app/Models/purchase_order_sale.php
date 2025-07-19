<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchase_order_sale extends Model
{
    use HasFactory;
    protected $table ='purchase_order_sale';

    protected $fillable =['sales_code','total_qty', 'return_Sale_id', 'sales_type','prefix','sales_qty','store_id','warehouse_id','reference_no','sales_date','due_date','tot_discount_to_all_amt','customer_id','subtotal','round_off','invoice_terms','grand_total','paid_amount','sales_note','created_by','created_on','count_id','tax_report','discount_to_all_input','other_charges_amt','price_per_unit'];
}

