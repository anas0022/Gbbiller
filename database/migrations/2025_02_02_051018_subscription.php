<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('subscription',function(Blueprint $table){

            $table->id();
            $table->integer('duration');
            $table->integer('type');
            $table->integer('store_count');
            $table->integer('rate');
/*             $table->string('sub_token'); */
            $table->integer('executive_app')->nullable();
            $table->integer('dealers_app')->nullable();
            $table->integer('customer_app')->nullable();
            $table->string('note');
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
        //
    }
}
