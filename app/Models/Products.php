<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['category','product_code','product_name', 'product_description', 'product_image', 'product_price', 'product_quantity'];
}
