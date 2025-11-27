<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('type', ['admin', 'seller', 'customer', 'delivery'])->default('customer');
            $table->text('address')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('verified_at')->nullable();
            $table->enum('language', ['ar', 'en'])->default('ar');
            $table->rememberToken();
            $table->timestamps();
            
            $table->index('email');
            $table->index('type');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
