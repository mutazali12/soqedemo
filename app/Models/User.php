<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'type', // 'admin', 'seller', 'customer', 'delivery'
        'address',
        'avatar',
        'is_active',
        'verified_at',
        'language', // 'ar', 'en'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'verified_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    // العلاقات
    public function seller()
    {
        return $this->hasOne(Store::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function delivery()
    {
        return $this->hasOne(DeliveryPartner::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    // الدوال المساعدة
    public function isSeller()
    {
        return $this->type === 'seller';
    }

    public function isCustomer()
    {
        return $this->type === 'customer';
    }

    public function isDelivery()
    {
        return $this->type === 'delivery';
    }

    public function isAdmin()
    {
        return $this->type === 'admin';
    }
}
