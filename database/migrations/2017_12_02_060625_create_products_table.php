<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('merchant_id')->unsigned()->nullable();
            $table->string('sku', 10)->nullable();
            $table->text('name')->nullable();
            $table->float('price')->nullable();
            $table->nullableTimestamps();

            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('SET NULL');
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
