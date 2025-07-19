<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountrySettings extends Model
{
    use HasFactory;
    protected $table = 'country_settings';
    protected $fillable = ['country_name', 'country_code', 'mobile_code', 'currency_symbol', 'status'];
}
