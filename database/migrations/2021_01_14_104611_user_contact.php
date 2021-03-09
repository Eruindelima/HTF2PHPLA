<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserContact extends Migration
{
    public function up()
    {
        Schema::create('user_contact', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('cpf');
            $table->string('address');
            $table->string('neighborhood');
            $table->string('cep');
            $table->string('city');
            $table->string('state');
            $table->string('phone');
            $table->timestamps();
            $table->increments('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_contact');
    }
}
