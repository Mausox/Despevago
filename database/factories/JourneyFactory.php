<?php

use Faker\Generator as Faker;
use App\Journey;
use App\Airport;
use App\Flight;

$factory->define(Journey::class, function (Faker $faker) {
    return [
        'departure_date' => $faker->dateTimeBetween('now', '+2 weeks'),
        'departure_hour' => $faker->time(),
        'arrival_date' => $faker->dateTimeBetween('+3 weeks', '+4 weeks'),
        'arrival_hour' => $faker->time(),
        'flight_id' => Flight::all()->random()->id,
        'departure_airport_id' => Airport::all()->random()->id,
        'arrival_airport_id' => Airport::all()->random()->id,
    ];
});
