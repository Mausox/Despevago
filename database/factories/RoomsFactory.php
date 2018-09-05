<?php

use Faker\Generator as Faker;
use App\Hotel;
use App\Room;

$factory->define(Room::class, function (Faker $faker) {
    return
        [
        'capacity' => $faker->numberBetween(1,5),
        'adult_price' => $faker->numberBetween(100,1000),
        'child_price' => $faker->numberBetween(50,500),
        'description' => $faker->text(200),
        'hotel_id' => Hotel::all()->random()->id,
        'numeration' => $faker->numberBetween(1,1000),
        ];
});
