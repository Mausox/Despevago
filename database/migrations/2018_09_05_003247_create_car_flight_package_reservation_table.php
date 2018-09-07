<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarFlightPackageReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_flight_package_reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('car_flight_package_id');
            $table->unsignedInteger('reservation_id');
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
        Schema::dropIfExists('car_flight_package_reservation');
    }
}
