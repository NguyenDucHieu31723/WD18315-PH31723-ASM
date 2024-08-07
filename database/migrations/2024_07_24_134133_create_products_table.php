<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
            $table->string('name', 255)->unique();
            $table->string('image', 255)->nullable();
            $table->text('description')->nullable();
            $table->float('price', 8, 2);
            $table->timestamps();
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
