<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomFlightPackagesForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('room_flight_packages', function (Blueprint $table) {
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
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
        Schema::table('room_flight_packages', function (Blueprint $table) {
            $table->dropForeign(['room_id']);
            $table->dropForeign(['city_id']);
            $table->dropForeign(['seat_id']);
        });
    }
}
