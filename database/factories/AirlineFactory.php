<?php

use Faker\Generator as Faker;
use App\Airline;

$factory->define(Airline::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company." Airlines",
        'address' => $faker->unique()->address,
        'score' => $faker->numberBetween(0, 5),
        'description' => $faker->catchPhrase,
        'telephone'=> $faker->phoneNumber,
    ];
});
