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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('UserId')->nullable();
            $table->string('UserName')->nullable();
            $table->string('email')->nullable();
            $table->string('Phone')->nullable();
            $table->string('Address')->nullable();
            $table->integer('productId')->nullable();
            $table->string('Item')->nullable();
            $table->string('Quantity')->nullable();
            $table->string('Price')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
