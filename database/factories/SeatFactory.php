<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
use App\Seat;
use App\Flight;
use App\ClassType;
use App\Passenger;

$factory->define(Seat::class, function (Faker $faker) {
    
    
    $date = $faker->dateTimeBetween('-2 days', '+3 days');
    $hour = $faker->dateTime;
    $status = 0;

    if($date >(Carbon::now()))
    {
        $status = 0;
    }
    else {
        if($hour < (Carbon::now()))
        {
            $status = 1;
        }
    }
    
    return
    [
        'number' => $faker->swiftBicNumber,
        'status' => $status,
        'price' => $faker->numberBetween(50,500),
        'flight_id' => Flight::all()->random()->id,
        'class_type_id' => ClassType::all()->random()->id,
        'passenger_id' => null,
    ];
});
