<?php

use Illuminate\Database\Seeder;
use App\Journey;

class JourneyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Journey::class, 100)->create();
    }
}
