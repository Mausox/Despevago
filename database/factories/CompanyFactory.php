<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
    ];
});
