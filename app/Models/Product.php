<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'name',
        'description',
        'status'
    ];
    
    protected $appends = [
        'created_date'
    ];

    public function getCreatedDateAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->toDayDateTimeString();
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
