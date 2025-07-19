<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_method extends Model
{
    use HasFactory;

    protected $table = "sub-method";

    protected $fillable = ['method','dis','icon'];
    
}
