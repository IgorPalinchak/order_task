<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * There was in task to create field 'product_id', but i desided we should not, because there exist
     * a relation many-to-many in 'order_products' table
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('user_id')->index('orders_user_id')->unsigned();
//            $table->integer('product_id')->index('orders_product_id')->unsigned();
            $table->enum('status', ['pending', 'done', 'declined'])->default('pending');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
