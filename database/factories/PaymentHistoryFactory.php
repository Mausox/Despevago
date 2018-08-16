<?php

use Faker\Generator as Faker;
use App\PaymentHistory;
use App\PaymentMethod;
use App\User;

$factory->define(PaymentHistory::class, function (Faker $faker) {
    $id = PaymentMethod::all()->random()->id;
    return [
        'bank_name' => PaymentMethod::find($id)->card_name,
        'account_number' => PaymentMethod::find($id)->account_number,
        'amount' => $faker->randomNumber(5),
        'date' => $faker->dateTime('now'),
        'hour' => $faker->dateTime('now'),
        'user_id' => User::all()->random()->id,
    ];
});
