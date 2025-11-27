<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index('parent_id');
            $table->index('slug');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
