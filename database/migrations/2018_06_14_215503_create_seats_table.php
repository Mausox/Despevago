<?php

use Illuminate\Support\Facades\Schema;
use Aejnsn\Postgresify\Database\Schema\Blueprint;
//use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->increments('seat_id');
            $table->string('number');
            $table->integer('status');
            $table->money('price');
            $table->timestamps();
            $table->unsignedInteger('passenger_id');
            $table->unsignedInteger('class_type_id');
            $table->unsignedInteger('flight_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seats');
    }
}
