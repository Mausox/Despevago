<?php

use Faker\Generator as Faker;
use App\AirlineContact;
use App\Airline;

$factory->define(AirlineContact::class, function (Faker $faker) {
    $id = Airline::all()->random()->id;
    return [
        'telephone' => $faker->e164PhoneNumber,
        'airline_id' => $id,
    ];
});
