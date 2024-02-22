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
        Schema::create('user_cards', function (Blueprint $table) {
            $table->id();
            $table->integer('User_id')->nullable();
            $table->string('Name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();

            $table->integer('Product_id')->nullable();
            $table->string('Item')->nullable();
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
           
            
            $table->string('payment_status')->nullable();
            $table->string('delivery_status')->nullable();

            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_cards');
    }
};
