<?php

use Illuminate\Database\Seeder;
use App\AirlineContact;

class AirlineContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AirlineContact::class, 50)->create();
    }
}
