<?php

use Illuminate\Database\Seeder;
use App\Airport;

class AirportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Airport::class, 10)->create();
    }
}
