<?php

use Faker\Generator as Faker;
use App\User;
use App\UserType;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'telephone' => $faker->unique()->phoneNumber,
        'password' => bcrypt('secret'), // secret
        'address' => $faker->address,
        'current_balance' => $faker->randomNumber(5),
        'remember_token' => str_random(10),
    ];
});
