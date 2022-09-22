<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = "order_items";

    public function order()
    {
        return $this->belongsTo(Order::Class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::Class, 'product_id');
    }

    public function review()
    {
        return $this->hasOne(Review::Class, 'order_item_id');
    }
}
