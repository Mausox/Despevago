<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomFlightPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_flight_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('start_date');
            $table->time('start_hour');
            $table->date('end_date');
            $table->time('end_hour');
            $table->integer('discount');
            $table->timestamps();
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('room_id')->nullable();
            $table->unsignedInteger('seat_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_flight_packages');
    }
}
