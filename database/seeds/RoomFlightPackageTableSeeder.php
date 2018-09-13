<?php

use Illuminate\Database\Seeder;
use App\RoomFlightPackage;

class RoomFlightPackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room_flight_package = new RoomFlightPackage();
        $room_flight_package->name = "Package in Santiago";
        $room_flight_package->start_date = \Carbon\Carbon::now()->toDateString();
        $room_flight_package->start_hour = \Carbon\Carbon::now()->toTimeString();
        $room_flight_package->end_date = "2018-10-01";
        $room_flight_package->end_hour = "00:00:00";
        $room_flight_package->discount = 200;
        $room_flight_package->city_id = "1";
        $room_flight_package->save();

        $room_flight_package = new RoomFlightPackage();
        $room_flight_package->name = "Package in Buenos Aires";
        $room_flight_package->start_date = \Carbon\Carbon::now()->toDateString();
        $room_flight_package->start_hour = \Carbon\Carbon::now()->toTimeString();
        $room_flight_package->end_date = "2018-10-01";
        $room_flight_package->end_hour = "00:00:00";
        $room_flight_package->discount = 200;
        $room_flight_package->city_id = "6";
        $room_flight_package->save();

        $room_flight_package = new RoomFlightPackage();
        $room_flight_package->name = "Package in Brasilia";
        $room_flight_package->start_date = \Carbon\Carbon::now()->toDateString();
        $room_flight_package->start_hour = \Carbon\Carbon::now()->toTimeString();
        $room_flight_package->end_date = "2018-10-01";
        $room_flight_package->end_hour = "00:00:00";
        $room_flight_package->discount = 200;
        $room_flight_package->city_id = "5";
        $room_flight_package->save();
    }
}
