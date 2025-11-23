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
            $table->string('order_number', 20)->nullable(false)->unique('orders_number_unique');
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('address_id')->nullable();
            $table->integer('final_price')->nullable(false);
            $table->enum('status', ['pending', 'processing', 'shipped', 'completed', 'cancelled'])->nullable(false)->default('pending');
            $table->string('payment_method')->nullable(); // gopay, bank_transfer, dll
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'expired'])->default('pending');
            $table->integer('shipping_price')->nullable()->default(0);
            $table->string('shipping_method', 50)->nullable()->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('address_id')->on('addresses')->references('id');
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
