<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('original_price', 10, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->string('sku')->unique();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->decimal('rating', 3, 2)->default(0);
            $table->integer('sold_count')->default(0);
            $table->timestamps();
            
            $table->index('store_id');
            $table->index('category_id');
            $table->index('sku');
            $table->index('is_active');
            $table->fullText(['name_ar', 'name_en', 'description_ar', 'description_en']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
