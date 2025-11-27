<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'category_id',
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'price',
        'original_price',
        'stock',
        'sku',
        'image',
        'is_active',
        'rating',
        'sold_count',
    ];

    protected $casts = [
        'price' => 'float',
        'original_price' => 'float',
        'is_active' => 'boolean',
        'rating' => 'float',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'ar' ? $this->name_ar : $this->name_en;
    }

    public function isAvailable()
    {
        return $this->is_active && $this->stock > 0;
    }

    public function hasDiscount()
    {
        return $this->original_price && $this->price < $this->original_price;
    }

    public function getDiscountPercentage()
    {
        if (!$this->hasDiscount()) return 0;
        return round((($this->original_price - $this->price) / $this->original_price) * 100);
    }
}
