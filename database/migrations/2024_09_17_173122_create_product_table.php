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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->unsignedBigInteger('category_id');
            $table->string('prod');
            $table->text('desc');
            $table->text('l_desc');
            $table->integer('prod_price');
            $table->integer('selling_price');
            $table->integer('discount_percent')->default(0);
            $table->integer('stock')->default(0);
            $table->string('prod_img');
            $table->string('model');
            $table->string('delivery');
            $table->string('size');
            $table->string('status')->default('active');

            $table->string('slug')->unique();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
