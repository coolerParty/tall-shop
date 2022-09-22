<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // public function orderItems() : HasMany
    // {
    //     return $this->hasMany(OrderItem::Class);
    // }

    public function ratings()
    {
        return $this->hasManyThrough(Review::class, OrderItem::class,
        'product_id', // Foreign key on the environments table...
        'order_item_id', // Foreign key on the deployments table...
        'id', // Local key on the projects table...
        'id' // Local key on the environments table...
    );
    }
}
