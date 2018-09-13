<?php

use Faker\Generator as Faker;
use App\Company;
use App\City;

$factory->define(App\BranchOffice::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'company_id' => Company::all()->random()->id,
        'city_id' => City::all()->random()->id,
        'telephone' => $faker->phoneNumber,
    ];
});
