<?php

use Faker\Generator as Faker;

$factory->define(App\Trip::class, function (Faker $faker) {
    return [
        'departure_city' => 'Chile',
        'departure_date' => $faker->dateTimeBetween('now', '+2 weeks'),
        'departure_hour' => $faker->time(),
        'arrival_city' => 'Chile',
        'arrival_date' => $faker->dateTimeBetween('+2 weeks', '+3 weeks'),
        'arrival_hour' => $faker->time(),
        'direct' => $faker->numberBetween(0, 1),
    ];
});
