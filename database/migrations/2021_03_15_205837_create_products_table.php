<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->string('source_url');
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->string('image');
            $table->integer('price');
            $table->integer('price_discount')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->integer('is_promotion')->default(0)->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}