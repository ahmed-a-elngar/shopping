<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    use HasFactory;

    function order()
    {
        return $this->belongsTo(Order::classو,'order');
    }
    function product()
    {
        return $this->belongsTo(Product::class, 'product');
    }
}
