<?php

use Faker\Generator as Faker;
use App\Company;
use App\BranchOffice;

$factory->define(App\Car::class, function (Faker $faker) {

    $faker->addProvider(new \Faker\Provider\Fakecar($faker));
    $v = $faker->vehicleArray();

    return [
        'brand' => $v['brand'],
        'model' => $v['model'],
        'type' => $faker->vehicleType,
        'capacity' => $faker->numberBetween(2,5),
        'price' => rand(200, 1000),
        'branch_office_id' => BranchOffice::all()->random()->id,
    ];
});
