<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountrySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_settings', function (Blueprint $table) {
            $table->id();
            $table->string('country_name')->nullable();
            $table->string('currency')->nullable();
            $table->string('country_code')->nullable();
            $table->string('mobile_code')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('country_settings');
    }
}
