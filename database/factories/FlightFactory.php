<?php

use Faker\Generator as Faker;
use App\Flight;
use App\Airport;
use App\Airline;

$factory->define(Flight::class, function (Faker $faker) {
    return [
        'flight_number' => $faker->swiftBicNumber,
        'cabin_baggage' => $faker->numberBetween(0,3),
        'capacity' => $faker->numberBetween(0,400),
        'airplane_model' => $faker->swiftBicNumber,
        'airline_id' => Airline::all()->random()->id,
    ];
});
