<?php

use Illuminate\Database\Seeder;
use App\Passenger;

class PassengerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Passenger::class, 10)->create();
    }
}
