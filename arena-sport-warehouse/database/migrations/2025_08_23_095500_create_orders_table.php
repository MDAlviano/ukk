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
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->float('total_amount')->nullable(false);
            $table->string('status', 20)->nullable(false);
            $table->unsignedBigInteger('payment_id')->nullable(false);
            $table->unsignedBigInteger('shipment_id')->nullable(false);
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('payment_id')->on('payments')->references('id');
            $table->foreign('shipment_id')->on('shipments')->references('id');
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
