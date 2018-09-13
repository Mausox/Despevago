<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarFlightPackagesForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car_flight_packages', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreign('seat_id')->references('id')->on('seats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car_flight_packages', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropForeign(['car_id']);
            $table->dropForeign(['seat_id']);
        });
    }
}
