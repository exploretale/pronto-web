<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id', false, true)->nullable();
            $table->integer('product_id', false, true)->nullable();
            $table->integer('quantity', false, true)->nullable();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('SET NULL');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
