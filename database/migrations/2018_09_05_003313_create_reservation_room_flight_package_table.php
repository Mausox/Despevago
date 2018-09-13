<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationRoomFlightPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_room_flight_package', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reservation_id');
            $table->unsignedInteger('room_flight_package_id');
            $table->boolean('closed');
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
        Schema::dropIfExists('reservation_room_flight_package');
    }
}
