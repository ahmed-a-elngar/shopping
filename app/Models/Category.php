<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    function product()
    {
        return $this->hasMany(Product::class);
    }
    function target()
    {
        return $this->belongsTo(Target::class);
    }

}
