<?php

use Faker\Generator as Faker;
use App\Hotel;
use App\City;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->companyEmail,
        'score' => $faker->numberBetween(1,5),
        'description'=> $faker->text,
        'city_id' => City::all()->random()->id,
    ];
});
