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
            $table->string('order_id')->primary();
            $table->unsignedBigInteger('user_id');
            $table->string('email');
            $table->decimal('price', 12, 2);
            $table->string('voucher_code')->nullable();
            $table->decimal('voucher_discount', 12, 2)->nullable();
            $table->decimal('final_price', 12, 2);
            $table->string('delivery_method');
            $table->string('payment_option');
            $table->string('note')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->dateTime('order_date');
            $table->enum('status', ['diproses', 'dibatalkan', 'selesai']);
            $table->enum('billing', ['dibayar', 'belum dibayar']);
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
