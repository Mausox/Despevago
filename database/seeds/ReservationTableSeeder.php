<?php

use Illuminate\Database\Seeder;
use App\Reservation;
use App\Activity;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Reservation::class,3)->create()->each(function($reservation){
            $reservation->activities()->attach(Activity::all()->random()->id, ['closed' => false]);
        });
    }
}
