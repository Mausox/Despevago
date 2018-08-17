<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('flight_number');
            $table->date('departure_date');
            $table->time('departure_hour');
            $table->date('arrival_date');
            $table->time('arrival_time');
            $table->integer('cabin_baggage');
            $table->integer('capacity');
            $table->string('airplane_model');
            $table->timestamps();
            $table->unsignedInteger('airline_id');
            $table->unsignedInteger('airport_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
