<?php

use Faker\Generator as Faker;
use App\Airport;
use App\City;

$factory->define(Airport::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'address' => $faker->address,
        'city_id' => City::all()->random()->id,
    ];
});
