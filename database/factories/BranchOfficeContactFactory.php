<?php

use Faker\Generator as Faker;
use App\BranchOffice;

$factory->define(App\BranchOfficeContact::class, function (Faker $faker) {
    return [
        'telephone' => $faker->unique()->phoneNumber,
        'branch_office_id' => BranchOffice::all()->random()->id,
    ];
});
