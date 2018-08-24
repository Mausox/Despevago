<?php

use Faker\Generator as Faker;
use App\Reservation;
use App\User;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        'date' => $faker->dateTimeBetween('-5 days','-1 day'),
        'hour' => $faker->dateTime,
        'current_balance' => $faker->numberBetween(100,200),
        'new_balance' => $faker->numberBetween(100,300),
        'user_id' => User::all()->random()->id,
        'closed' => true,
    ];
});
