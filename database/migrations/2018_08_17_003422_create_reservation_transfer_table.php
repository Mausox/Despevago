<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_transfer', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('transfer_id');
            $table->unsignedInteger('reservation_id');
            $table->foreign('transfer_id')->references('id')->on('transfers')->onDelete('cascade');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
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
        Schema::table('reservation_transfer', function (Blueprint $table){
            $table->dropForeign(['transfer_id']);
            $table->dropForeign(['reservation_id']);
        });
        Schema::dropIfExists('reservation_transfer');
    }
}
