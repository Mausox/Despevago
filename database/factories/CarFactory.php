<?php

use Faker\Generator as Faker;
use App\Company;
use App\BranchOffice;

$factory->define(App\Car::class, function (Faker $faker) {
    return [
        'pick_up_location' => BranchOffice::all()->random()->address,
        'drop_off_location' => BranchOffice::all()->random()->address,
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
        'company_id' => Company::all()->random()->id,
    ];
});
