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
            // $table->unsignedBigInteger('customer_id');
            // $table->unsignedBigInteger('product_id'); // Agar aap ek product se order link kar rahe hain
            $table->integer('quantity');
            $table->decimal('total_amount', 10, 2);
            $table->string('payment_status');
            $table->string('order_status');
            $table->text('shipping_address');
            $table->timestamps();

            // $table->id();
            // $table->unsignedBigInteger('user_id'); // foreign key to users table
            // $table->string('prod_title');
            // $table->string('product_details')->nullable(); // e.g., size, color, etc.
            // $table->decimal('price', 8, 2); // item price
            // $table->decimal('total_price', 10, 2); // total price of order
            // $table->enum('shipping', ['Free', 'Standard', 'Express'])->default('Free');
            // $table->enum('payment_method', ['bank_transfer', 'cash_on_delivery', 'credit_card']);
            // $table->timestamps();

            // $table->foreign('customer_id')->references('id')->on('customers'); // Customers table ke liye
            // $table->foreign('product_id')->references('id')->on('products'); // Products table ke liye
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
