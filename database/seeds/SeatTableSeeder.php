<?php

use Illuminate\Database\Seeder;
use App\Seat;

class SeatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Seat::class, 10)->create();
    }
}
