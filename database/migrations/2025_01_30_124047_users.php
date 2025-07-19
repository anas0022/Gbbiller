<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users' , function(Blueprint $table){

            $table->id();
            $table->string('username');
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('password');
            $table->string('role');
            $table->integer('user_type');
            $table->integer('store_id');
            $table->integer('mobile_code');
            $table->integer('plan');
            $table->integer('created_by');
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
        Schema::dropIfExists('users');
    }
}
