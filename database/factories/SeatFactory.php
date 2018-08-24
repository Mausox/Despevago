<?php

use Faker\Generator as Faker;
use App\Seat;
use App\Flight;
use App\ClassType;
use App\Passenger;

$factory->define(Seat::class, function (Faker $faker) {
    return
    [
        'number' => $faker->swiftBicNumber,
        'status' => $faker->numberBetween(0,1),
        'price' => $faker->numberBetween(50,500),
        'flight_id' => Flight::all()->random()->id,
        'class_type_id' => ClassType::all()->random()->id,
        'passenger_id' => Passenger::all()->random()->id,
    ];
});
