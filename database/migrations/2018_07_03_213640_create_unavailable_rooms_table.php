<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnavailableRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unavailable_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->timestamps();
            $table->unsignedInteger('reservation_id');
            $table->unsignedInteger('room_id');
            $table->boolean('closed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unavailable_rooms');
    }
}
