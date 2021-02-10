<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPendantColumnProductOrderTable extends Migration
{
    public function up()
    {
        Schema::table('product_order', function (Blueprint $table) {
            $table->boolean('pendant')->default(true);
        });
    }

    public function down()
    {
        Schema::table('product_order', function (Blueprint $table) {
            $table->dropColumn('pendant');
        });
    }
}
