<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expensecat extends Model
{
    use HasFactory;

protected $table ='expense_category';
protected $fillable =['name','description','count_id','category_code','category_name','created_by','status'];
}
