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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id(); // Invoice Number
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('category');
            $table->string('item');
            $table->integer('item_id');
            $table->integer('quantity');
            $table->string('address');
            $table->string('postalCode');
            $table->integer('price');
            $table->integer('totalPrice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
