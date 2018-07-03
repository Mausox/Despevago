<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unavailable_rooms', function (Blueprint $table) {
            $table->foreign('reservation_id')->references('reservation_id')->on('reservations')->onDelete('cascade');
            $table->foreign('room_id')->references('room_id')->on('rooms')->onDelete('cascade');

        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->foreign('hotel_id')->references('hotel_id')->on('hotels')->onDelete('cascade');
        });

        Schema::table('hotel_contacts', function (Blueprint $table) {
            $table->foreign('hotel_id')->references('hotel_id')->on('hotels')->onDelete('cascade');
        });

        Schema::table('hotels', function (Blueprint $table) {
            $table->foreign('city_id')->references('city_id')->on('cities')->onDelete('cascade');
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
            $table->dropForeign('unavailable_rooms_reservation_id_foreign');
            $table->dropForeign('unavailable_rooms_room_id_foreign');

        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign('rooms_hotel_id_foreign');
        });

        Schema::table('hotel_contacts', function (Blueprint $table) {
            $table->dropForeign('hotel_contacts_hotel_id_foreign');
        });

        Schema::table('hotels', function (Blueprint $table) {
            $table->dropForeign('hotels_city_id_foreign');
        });
    }
}
