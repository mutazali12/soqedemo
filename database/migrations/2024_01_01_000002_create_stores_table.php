<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('phone');
            $table->text('address');
            $table->string('city');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('commercial_number')->unique();
            $table->string('tax_number')->nullable();
            $table->decimal('rating', 3, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('bank_account')->nullable();
            $table->string('bank_name')->nullable();
            $table->timestamps();
            
            $table->index('user_id');
            $table->index('slug');
            $table->index('city');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
