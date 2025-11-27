<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'customer_id',
        'store_id',
        'delivery_partner_id',
        'status', // pending, confirmed, preparing, ready_for_pickup, in_transit, delivered, cancelled, returned
        'payment_method', // cash, card
        'payment_status', // pending, completed, failed
        'subtotal',
        'tax',
        'delivery_fee',
        'discount',
        'total',
        'customer_address',
        'customer_phone',
        'notes',
        'delivered_at',
        'cancelled_at',
    ];

    protected $casts = [
        'subtotal' => 'float',
        'tax' => 'float',
        'delivery_fee' => 'float',
        'discount' => 'float',
        'total' => 'float',
        'delivered_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function deliveryPartner()
    {
        return $this->belongsTo(DeliveryPartner::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
