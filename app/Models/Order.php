<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $table = 'orders';
    protected $fillable = ['customer_id','total_price','status','payment_method','shipping_address','orderNo','expected_delivery_date'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
