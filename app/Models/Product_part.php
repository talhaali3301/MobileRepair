<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_part extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'product_id',
        'name',
        'description',
        'status',
        'price'
    ];
    
    protected $appends = [
        "created_date"
    ];
}
