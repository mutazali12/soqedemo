<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('wallet_balance', 10, 2)->default(0);
            $table->integer('loyalty_points')->default(0);
            $table->decimal('total_spent', 10, 2)->default(0);
            $table->integer('total_orders')->default(0);
            $table->timestamps();
            
            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
