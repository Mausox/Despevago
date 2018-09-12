<?php

use Illuminate\Database\Seeder;
use App\CarFlightPackage;

class CarFlightPackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car_flight_package = new CarFlightPackage();
        $car_flight_package->name = "Package in Santiago";
        $car_flight_package->start_date = \Carbon\Carbon::now()->toDateString();
        $car_flight_package->start_hour = \Carbon\Carbon::now()->toTimeString();
        $car_flight_package->end_date = "2018-10-01";
        $car_flight_package->end_hour = "00:00:00";
        $car_flight_package->discount = 200;
        $car_flight_package->city_id = "1";
        $car_flight_package->save();

        $car_flight_package = new CarFlightPackage();
        $car_flight_package->name = "Package in Buenos Aires";
        $car_flight_package->start_date = \Carbon\Carbon::now()->toDateString();
        $car_flight_package->start_hour = \Carbon\Carbon::now()->toTimeString();
        $car_flight_package->end_date = "2018-10-01";
        $car_flight_package->end_hour = "00:00:00";
        $car_flight_package->discount = 200;
        $car_flight_package->city_id = "6";
        $car_flight_package->save();

        $car_flight_package = new CarFlightPackage();
        $car_flight_package->name = "Package in Brasilia";
        $car_flight_package->start_date = \Carbon\Carbon::now()->toDateString();
        $car_flight_package->start_hour = \Carbon\Carbon::now()->toTimeString();
        $car_flight_package->end_date = "2018-10-01";
        $car_flight_package->end_hour = "00:00:00";
        $car_flight_package->discount = 200;
        $car_flight_package->city_id = "5";
        $car_flight_package->save();
    }
}
