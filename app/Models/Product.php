<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    function category()
    {
        return $this->belongsTo(Category::class, 'category');
    }
    function owner()
    {
        return $this->belongsTo(User::class, 'owner');
    }
    function brand()
    {
        return $this->belongsTo(Brand::class, 'brand');
    }
    function stock()
    {
        return $this->belongsTo(Stock::class, 'stock');
    }
}
