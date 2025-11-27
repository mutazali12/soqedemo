<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'code',
        'description_ar',
        'description_en',
        'discount_type', // percentage, fixed
        'discount_value',
        'minimum_purchase',
        'usage_limit',
        'usage_count',
        'valid_from',
        'valid_until',
        'is_active',
    ];

    protected $casts = [
        'discount_value' => 'float',
        'minimum_purchase' => 'float',
        'valid_from' => 'datetime',
        'valid_until' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function isValid()
    {
        return $this->is_active 
            && $this->valid_from <= now() 
            && $this->valid_until >= now()
            && $this->usage_count < $this->usage_limit;
    }
}
