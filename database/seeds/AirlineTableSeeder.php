<?php

use Illuminate\Database\Seeder;
use App\Airline;

class AirlineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Airline::class, 10)->create();
    }
}
