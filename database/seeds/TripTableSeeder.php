<?php

use Illuminate\Database\Seeder;
use App\Trip;

class TripTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Trip::class, 10)->create();
    }
}
