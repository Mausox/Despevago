<?php

use Faker\Generator as Faker;
use App\PaymentMethod;

$factory->define(PaymentMethod::class, function (Faker $faker) {
    return [
        'card_name' => $faker->creditCardType,
        'account_number' => $faker->creditCardNumber,
        'expiration_date' => $faker->creditCardExpirationDate,
    ];
});
