<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'license_number',
        'vehicle_type',
        'vehicle_plate',
        'commission_percentage',
        'is_active',
        'rating',
        'total_deliveries',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'rating' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
