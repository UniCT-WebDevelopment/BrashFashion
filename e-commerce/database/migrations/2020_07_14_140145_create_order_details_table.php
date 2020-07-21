<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cod_order')->unsigned();
            $table->bigInteger('cod_product')->unsigned();
            $table->integer('quantity');
            $table->foreign('cod_product')
                    ->references('id')->on('products')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('cod_order')
                    ->references('id')->on('orders')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        //Schema::dropIfExists('order_details');
    }
}
