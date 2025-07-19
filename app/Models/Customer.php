<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';

    protected $fillable =['customer_name','created_by','gst_no','previous_due','customer_id','store_id','tax_number','sale_executive_id'];
}
