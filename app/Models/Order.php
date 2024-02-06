<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'product_id',
        'product_part_id',
        'customer_id',
        'driver_id',
        'agent_id',
        'status'
    ];
    
    protected $appends = [
        "created_date"
    ];
}
