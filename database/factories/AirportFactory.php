<?php

use Faker\Generator as Faker;
use App\Airport;
use App\City;

$factory->define(Airport::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company." Airport",
        'address' => $faker->unique()->address,
        'city_id' => City::all()->random()->id,
    ];
});
