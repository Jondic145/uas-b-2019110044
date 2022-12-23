<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item', function (Blueprint $table) {
            $table->char('item_id',16)->references('id')->on('items')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('order_id')->references('id')->on('orders')->constrained()->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->constrained()->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->constrained()->onDelete('cascade');
            $table->integer('quantity')->nullable();

        });
    }

    /**s
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_item');
    }
}
