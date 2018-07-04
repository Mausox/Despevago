<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsForeignKey extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('unavailable_rooms', function (Blueprint $table) {
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });

        Schema::table('hotel_contacts', function (Blueprint $table) {
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });

        Schema::table('hotels', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unavailable_rooms', function (Blueprint $table) {
            $table->dropForeign(['reservation_id']);
            $table->dropForeign(['room_id']);

        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
        });

        Schema::table('hotel_contacts', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
        });

        Schema::table('hotels', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
        });
    }
}
