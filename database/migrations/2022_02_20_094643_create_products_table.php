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
            $table->string('name');
            $table->string('picture');
            $table->string('description');
            $table->unsignedDouble('price');
            $table->unsignedDouble('total_price');
            $table->unsignedBigInteger('stock');
            $table->foreign('stock')->references('id')->on('stocks')
                  ->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('owner');
            $table->foreign('owner')->references('id')->on('users')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('id')->on('categories')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('brand');
            $table->foreign('brand')->references('id')->on('brands')
                ->onDelete('cascade')->onUpdate('cascade');
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
