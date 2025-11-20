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
            $table->integer('final_price')->nullable(false);
            $table->enum('status', ['pending', 'processing', 'shipped', 'completed', 'cancelled'])->nullable(false)->default('pending');
            $table->unsignedBigInteger('payment_id')->nullable(false);
            $table->unsignedBigInteger('shipment_id')->nullable(false);
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('payment_id')->on('payments')->references('id');
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
