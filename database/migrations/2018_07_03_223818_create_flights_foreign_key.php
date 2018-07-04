<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seats', function (Blueprint $table) {
            $table->foreign('passenger_id')->references('id')->on('passengers')->onDelete('cascade');
            $table->foreign('class_type_id')->references('id')->on('class_types')->onDelete('cascade');
            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');
        });

        Schema::table('flights', function (Blueprint $table) {
            $table->foreign('airline_id')->references('id')->on('airlines')->onDelete('cascade');
            $table->foreign('airport_id')->references('id')->on('airports')->onDelete('cascade');
        });

        Schema::table('airlines', function (Blueprint $table) {
            $table->foreign('airline_contact_id')->references('id')->on('airline_contacts')->onDelete('cascade');
        });

        Schema::table('airports', function (Blueprint $table)
        {
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seats', function (Blueprint $table) {
            $table->dropForeign(['passenger_id']);
            $table->dropForeign(['class_type_id']);
            $table->dropForeign(['flight_id']);
        });

        Schema::table('flights', function (Blueprint $table) {
            $table->dropForeign(['airline_id']);
            $table->dropForeign(['airport_id']);
        });

        Schema::table('airlines', function (Blueprint $table) {
            $table->dropForeign(['airline_contact_id']);
        });

        Schema::table('airports', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
        });
    }
}
