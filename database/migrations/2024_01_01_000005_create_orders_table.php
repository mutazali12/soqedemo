<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->foreignId('delivery_partner_id')->nullable()->constrained('delivery_partners')->onDelete('set null');
            $table->enum('status', [
                'pending', 'confirmed', 'preparing', 'ready_for_pickup',
                'in_transit', 'delivered', 'cancelled', 'returned'
            ])->default('pending');
            $table->enum('payment_method', ['cash', 'card'])->default('cash');
            $table->enum('payment_status', ['pending', 'completed', 'failed'])->default('pending');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('tax', 10, 2)->default(0);
            $table->decimal('delivery_fee', 10, 2)->default(0);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('total', 10, 2);
            $table->text('customer_address');
            $table->string('customer_phone');
            $table->text('notes')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();
            
            $table->index('customer_id');
            $table->index('store_id');
            $table->index('status');
            $table->index('order_number');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
