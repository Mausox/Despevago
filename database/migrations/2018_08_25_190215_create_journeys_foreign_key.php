<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJourneysForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('journeys', function (Blueprint $table) {
            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');
            $table->foreign('departure_airport_id')->references('id')->on('airports')->onDelete('restrict');
            $table->foreign('arrival_airport_id')->references('id')->on('airports')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('journeys', function (Blueprint $table) {
            $table->dropForeign(['flight_id']);
            $table->dropForeign(['departure_airport_id']);
            $table->dropForeign(['arrival_airport_id']);
        });
    }
}
