<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'logo',
        'cover_image',
        'phone',
        'address',
        'city',
        'latitude',
        'longitude',
        'commercial_number',
        'tax_number',
        'rating',
        'is_active',
        'bank_account',
        'bank_name',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'rating' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'store_categories');
    }
}
