<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table ='purchase';

    protected $fillable = [
        'purchase_code', 'created_by', 'store_id', 'purchase_note',
        'other_charges_input', 'subtotal', 'reference_no', 'prefix',
        'round_off',  'supplier_id', 'purchase_date','tax_id',
        'grand_total',  'count_id','paid_amount','created_on','bill_number','off_store_id','other_charges_amt','tot_discount_to_all_amt','discount_to_all_input','purchase_qty'
    ];
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id'); // Ensure 'store_id' is the correct foreign key
    }
}
