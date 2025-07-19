<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $table = "subscription";

    protected $fillable = ['duration','date','store_count','rate','note','executive_app','dealers_app','customer_app','type'] ;

    public function method()
    {
        return $this->belongsTo(sub_method::class, 'type', 'id');
    }
}
