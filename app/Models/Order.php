<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    function order_item()
    {
        return $this->hasMany(Order_Item::class, 'order');
    }
    function product()
    {
        return $this->hasMany(Product::class);
    }
}
