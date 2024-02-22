<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->autoIncrement();
            
            // $table->foreignId('category_id')
            // ->constrained('categories')
            // ->cascadeOnDelete();

            $table->string('title')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('category')->nullable();            
            $table->string('price')->nullable();
            $table->string('discount_price')->default(null);
            $table->string('quantity')->nullable(); 
            $table->string('image')->nullable();

            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
