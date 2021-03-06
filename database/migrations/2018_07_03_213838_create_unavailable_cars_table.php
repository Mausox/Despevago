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
            $table->increments('id');
            $table->timestamp('pick_up_date');
            $table->timestamp('return_date');
            $table->timestamps();
            $table->boolean('closed');
            $table->unsignedInteger('reservation_id');
            $table->unsignedInteger('car_id');
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
