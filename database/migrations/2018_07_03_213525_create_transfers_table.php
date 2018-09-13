<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date');
            $table->time('start_hour');
            $table->string('route');
            $table->unsignedInteger('number_people');
            $table->money('price');
            $table->timestamps();
            $table->unsignedInteger('hotel_id');
            $table->unsignedInteger('airport_id');
            $table->unsignedInteger('transfer_car_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
}
