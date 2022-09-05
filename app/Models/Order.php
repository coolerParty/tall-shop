<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderItems() : HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function shipping() : HasOne
    {
        return $this->hasOne(Shipping::class, 'order_id');
    }

    public function transaction() : HasOne
    {
        return $this->hasOne(Transaction::class, 'order_id');
    }
}
