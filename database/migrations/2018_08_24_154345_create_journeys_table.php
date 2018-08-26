<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journeys', function (Blueprint $table) {
            $table->increments('id');
            $table->date('departure_date');
            $table->time('departure_hour');
            $table->date('arrival_date');
            $table->time('arrival_hour');
            $table->timestamps();
            $table->unsignedinteger('flight_id');
            $table->unsignedinteger('departure_airport_id');
            $table->unsignedinteger('arrival_airport_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journeys');
    }
}
