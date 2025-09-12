<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = ['customer_id', 'product_id', 'quantity', 'price', 'total_price'];


    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id','id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
