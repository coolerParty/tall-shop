<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public function products() : HasMany
    {
        return $this->hasMany(Product::class,'category_id');
    }

    public function galleries() : HasMany
    {
        return $this->hasMany(Gallery::class,'category_id');
    }
}
