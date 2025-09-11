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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('address_id')->nullable(false);
            $table->string('method', 50)->nullable(false);
            $table->string('status', 20)->nullable(false);
            $table->string('tracking_number', 100)->nullable(false);
            $table->timestamps();

            $table->foreign('address_id')->on('addresses')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
