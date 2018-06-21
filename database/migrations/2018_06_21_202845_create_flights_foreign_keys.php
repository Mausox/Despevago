<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Add a foreign key in seats
         */
        Schema::table('seats', function (Blueprint $table) {
            $table->foreign('passenger_id')->references('passenger_id')->on('passengers')->onDelete('cascade');
            $table->foreign('class_type_id')->references('class_type_id')->on('class_types');
            $table->foreign('flight_id')->references('flight_id')->on('flights')->onDelete('cascade');

        });

        /**
         * Add a foreign key in flights
         */
        Schema::table('flights', function (Blueprint $table) {
            $table->foreign('airline_id')->references('airline_id')->on('airlines')->onDelete('cascade');
            $table->foreign('airport_id')->references('airport_id')->on('airports')->onDelete('cascade');
        });

        /**
         * Add a foreign key in airlines
         */
        Schema::table('airlines', function (Blueprint $table) {
            $table->foreign('airline_contact_id')->references('airline_contact_id')->on('airlines_contact');
        });

        /**
         * Add a foreign key in airports
         */
        Schema::table('airports', function (Blueprint $table)
        {
            $table->foreign('city_id')->refences('city_id')->on('cities');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /**
         * Delete a foreign key in seats
         */
        Schema::table('seats', function (Blueprint $table) {
            $table->dropForeign(['passenger_id']);
            $table->dropForeign(['class_type_id']);
            $table->dropForeign(['flight_id']);
        });

        /**
         * Delete a foreign key in flights
         */
        Schema::table('flights', function (Blueprint $table) {
            $table->dropForeign(['airline_id']);
            $table->dropForeign(['airport_id']);
        });

        /**
         * Delete a foreign key in airlines
         */
        Schema::table('airlines', function (Blueprint $table) {
            $table->dropForeign(['airline_contact_id']);
        });

        /**
         * Delete a foreign key in city_id
         */
        Schema::table('airports', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
        });
    }
}
