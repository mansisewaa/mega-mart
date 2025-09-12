<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'product_name',
        'product_code',
        'product_description',
        'product_image',
        'product_quantity',
        'product_original_price',
        'product_discount_price',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
