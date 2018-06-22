<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnavailableCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unavailable_cars', function (Blueprint $table) {
            $table->increments('unavailable_cars_id');
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

        Schema::dropIfExists('unavailable_cars');
    }
}
