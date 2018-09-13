<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\UserHistory::class, function (Faker $faker) {
    return [
        'date' => $faker->dateTime('now'),
        'hour' => $faker->dateTime('now'),
        'action' => $faker->randomElement([
            'User booked a flight',
            'User rented a car',
            'User booked an activity',
            'User booked an hotel room',
            'User bought a package',
        ]),
        'action_type' => $faker->randomElement([
            'Update',
            'Delete',
            'Reserve',
            'Create'
        ]),
        'user_id' => User::all()->random()->id,
    ];
});
