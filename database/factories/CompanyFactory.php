<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
    ];
});
