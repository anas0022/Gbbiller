<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class second_store extends Model
{
    use HasFactory;
    protected $table ='second_store';
    protected $fillable =['store_code','store_name','store_website','mobile','address','email','website','country','state','city','postcode','gst_no','app_price','store_id'];
}
