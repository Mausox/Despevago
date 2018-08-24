<?php

use Illuminate\Database\Seeder;
use App\Flight;

class FlightTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Flight::class,100)->create();
    }
}
