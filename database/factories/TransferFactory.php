<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
use App\Transfer;
use App\Hotel;
use App\Airport;
use App\TransferCar;

$factory->define(Transfer::class, function (Faker $faker) {

    $transfer_car = TransferCar::all()->random();
    $date = $faker->dateTimeBetween('-2 days', '+3 days');
    $hour = $faker->dateTimeBetween('-3 hours','+5 hours');
    $number_people = 0;

    if($date >(Carbon::now()))
    {
        $number_people = 0;
    }
    else {
        if($hour < (Carbon::now()))
        {
            $number_people = $faker->numberBetween(0,$transfer_car->capacity);
        }
    }

    return [
        'start_date' => $faker->dateTimeBetween('-2 days', '+3 days'),
        'start_hour' => $faker->dateTimeBetween('-3 hours','+5 hours'),
        'number_people' => $number_people,
        'price' => $faker->numberBetween(20,100),
        'route' => $faker->randomElement([
            'from hotel to airport',
            'from airport to hotel',
        ]),
        'hotel_id' => Hotel::all()->random()->id,
        'airport_id' => Airport::all()->random()->id,
        'transfer_car_id' => $transfer_car->id,
    ];
});
