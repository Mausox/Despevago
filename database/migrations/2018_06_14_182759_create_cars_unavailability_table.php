<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsUnavailabilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars_unavailability', function (Blueprint $table) {
            $table->increments('car_unavailability_id');
            $table->date('date');
            $table->timestamps();
            $table->integer('reservation_id')->unsigned();
            $table->integer('car_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('cars_unavailability');
    }
}
