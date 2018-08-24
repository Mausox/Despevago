<?php

use Faker\Generator as Faker;
use App\AirlineContact;
use App\Airline;

$factory->define(AirlineContact::class, function (Faker $faker) {
    return [
        'telephone' => $faker->unique()->e164PhoneNumber,
        'airline_id' => Airline::all()->random()->id,
    ];
});
