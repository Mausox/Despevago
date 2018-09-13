<?php

use Faker\Generator as Faker;
use App\Passenger;

$factory->define(Passenger::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'dni' => $faker->swiftBicNumber,
    ];
});
