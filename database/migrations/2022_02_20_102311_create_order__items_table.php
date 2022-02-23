<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order__items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product');
            $table->foreign('product')->references('id')->on('products')
                  ->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedSmallInteger('quantity');
            $table->unsignedBigInteger('order');
            $table->foreign('order')->references('id')->on('orders')
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
        Schema::dropIfExists('order__items');
    }
}
