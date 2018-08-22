<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transfers', function (Blueprint $table) {
            $table->foreign('airport_id')->references('id')->on('airports')->onDelete('cascade');
        });
        Schema::table('transfers', function (Blueprint $table) {
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });
        Schema::table('transfers', function (Blueprint $table) {
            $table->foreign('transfer_car_id')->references('id')->on('transfer_cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transfers', function (Blueprint $table) {
            $table->dropForeign(['airport_id']);
        });
        Schema::table('transfers', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
        });
        Schema::table('transfers', function (Blueprint $table) {
            $table->dropForeign(['transfer_car_id']);
        });
    }
}
