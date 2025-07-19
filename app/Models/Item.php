<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';

    protected $fillable = [
      

        'store_id' ,
      
      'part_no',
        'item_code' ,
        'created_by',
        'tax_amount' ,
        'item_name',
        'show_app',
        'app_price' ,
        'category_id',
        'brand_id' ,
        'unit_id',
        'sku' ,
        'hsn_code',
        'alert_quantity',
        'seller_point',
        'barcode',
        'expiry_date',
        'dis' ,
        'discount_type',
        'discount',
        'purchase_price',
        'tax_id' ,
        'tax_type' ,
        'price',
        'profit_margin',
        'sales_price',
        'mrp' ,
        'ware_house_id' ,
        'opening_stock' ,
    ];

    public function brand()
{
    return $this->belongsTo(Brand::class, 'brand_id');
}
public function category()
{
    return $this->belongsTo(category::class, 'category_id');
}

public function unit(){
    return $this->belongsTo(Unit::class, 'unit_id');
}
public function tax(){
    return $this->belongsTo(Tax::class, 'tax_id');
}

public static function previous_item_code()
{
    $last_item = self::orderBy('id', 'desc')->first();
    
    if ($last_item) {
        // Extract the numeric part and increment
        $last_number = (int) str_replace('IT-', '', $last_item->item_code);
        $next_number = $last_number + 1;
    } else {
        $next_number = 1; // Start from 1 if no items exist
    }
    
    // Format the new item code
    return 'IT-' . str_pad($next_number, 4, '0', STR_PAD_LEFT);
}
}