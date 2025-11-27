<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'store_id',
        'customer_id',
        'rating',
        'comment',
        'is_verified_purchase',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_verified_purchase' => 'boolean',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
