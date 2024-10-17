<?php

// Product.php (Model)
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'image', 'is_active'
    ];
}
