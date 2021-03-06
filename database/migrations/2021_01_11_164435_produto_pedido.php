<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProdutoPedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_order', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger("prod_id");
            $table->foreign('prod_id')->references('id')->on('products');

            $table->unsignedInteger("client_id");
            $table->foreign('client_id')->references('id')->on('users');

            $table->unsignedInteger("owner_id");
            $table->foreign('owner_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_order');
    }
}
