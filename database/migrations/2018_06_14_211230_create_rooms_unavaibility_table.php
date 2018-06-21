<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsUnavaibilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms_unavaibility', function (Blueprint $table) {
            $table->increments('room_unavaibility_id');
            $table->date('date');
            $table->timestamps();
            $table->unsignedInteger('reservation_id');
            $table->unsignedInteger('room_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms_unavaibility');
    }
}
