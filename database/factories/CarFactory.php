<?php

use Faker\Generator as Faker;

$factory->define(App\Car::class, function (Faker $faker) {
    return [
        'pick_up_date' => $faker->dateTimeBetween('now', '+2 weeks'),
        'pick_up_time' => $faker->time(),
        'return_date' => $faker->dateTimeBetween('+2 weeks', '+3 weeks'),
        'return_time' => $faker->time(),
        'classification' => $faker->randomElement([
            'Economy',
            'Intermediate',
            'Premium',
            'Luxury',
            'Eco',
            'Van',
            'Suv'
        ]),
        'price' => rand(200, 1000),
        'company_id' => $faker->numberBetween(1, 10),
    ];
});
