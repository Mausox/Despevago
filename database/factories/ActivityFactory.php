<?php

use Faker\Generator as Faker;
use App\Activity;
use App\City;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName. "Activity",
        'address' => $faker->address,
        'date' => $faker->dateTimeBetween('-5 days', '+10 days'),
        'price_adult' => $faker->numberBetween(50, 200),
        'price_child' => $faker->numberBetween(20, 100),
        'hour' => $faker->dateTime,
        'description' => $faker->text,
        'capacity' => $faker->numberBetween(10, 50),
        'city_id' => City::all()->random()->id,
    ];
});
