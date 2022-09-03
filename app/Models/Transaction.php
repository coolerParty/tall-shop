<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";

    public function order()
    {
        return $this->belongsTo(Order::Class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::Class, 'user_id');
    }
}
