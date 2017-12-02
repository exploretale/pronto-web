<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id')->unsigned()->nullable();
            $table->enum('status', [
                'PENDING',
                'SUCCESS',
                'FAILED'
            ])->default('PENDING');
            $table->string('request_id', 15)->nullable();
            $table->string('request_body', 16305)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
