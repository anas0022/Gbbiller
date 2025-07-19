<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            // Set parent to category_name if it's not explicitly set
            if (is_null($category->parent)) {
                $category->parent = $category->category_name;
            }
        });
}
}