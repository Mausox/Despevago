<?php

use Faker\Generator as Faker;

$factory->define(App\CarOption::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement([
            'Car Option 1',
            'Car Option 2',
            'Car Option 3',
        ]),
        'description' => $faker->randomElement([
            'This vehicle brings air conditioning and air purifier. In addition, it has a 7-inch multifunction bluetooth radio',
            'This vehicle brings air conditioning and air purifier. In addition, it has a 7-inch multifunction bluetooth radio, cruise control at the wheel and sunroof',
            'This vehicle brings an ISOFIX anchorage to attach a baby seat. It also has air conditioning and air purifier.',
        ]),
    ];
});
