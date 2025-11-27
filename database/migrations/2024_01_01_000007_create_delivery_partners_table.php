<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('delivery_partners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('company_name');
            $table->string('license_number')->unique();
            $table->string('vehicle_type');
            $table->string('vehicle_plate');
            $table->decimal('commission_percentage', 5, 2)->default(10);
            $table->boolean('is_active')->default(true);
            $table->decimal('rating', 3, 2)->default(0);
            $table->integer('total_deliveries')->default(0);
            $table->timestamps();
            
            $table->index('user_id');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('delivery_partners');
    }
};
