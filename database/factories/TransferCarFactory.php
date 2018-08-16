<?php

use Faker\Generator as Faker;
use App\TransferCar;

$factory->define(TransferCar::class, function (Faker $faker) {
    return [
        'vehicle_registration_number' => $faker->buildingNumber,
        'capacity' => $faker->numberBetween(2,6),
        'company' => $faker->domainName,
        'classification' => $faker->randomElement([
            'Economy',
            'Intermediate',
            'Premium',
            'Luxury',
            'Eco',
            'Van',
            'Suv',
        ]),

    ];
});
