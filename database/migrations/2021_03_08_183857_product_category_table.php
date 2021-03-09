<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductCategoryTable extends Migration
{
    public function up()
    {
        Schema::table(
            'product_category',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('name_category');

                $table->unsignedInteger('category_id');
                $table->foreignId('category_id')->references('id')->on('category');

                $table->unsignedInteger("prod_id");
                $table->foreign('prod_id')->references('id')->on('products');

                $table->timestamps();
            }
        );
    }

    public function down()
    {
        Schema::dropIfExists('product_category');
    }
}
