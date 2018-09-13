<?php

use Faker\Generator as Faker;

$factory->define(App\CarOption::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement([
            'Air conditioner',
            '7-inch multifunction bluetooth radio',
            'ISOFIX anchorage + baby seat',
            'GPS',
        ]),
    ];
});
