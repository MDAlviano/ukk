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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id', 100)->nullable(false);
            $table->string('name', 150)->nullable(false);
            $table->string('slug', 150)->nullable(false)->unique('users_slug_unique');
            $table->integer('price')->nullable(false);
            $table->string('image_url', 255)->nullable(false);
            $table->text('description')->nullable(false);
            $table->integer('stock')->default(0)->nullable(false);
            $table->unsignedBigInteger('category_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->on('categories')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
