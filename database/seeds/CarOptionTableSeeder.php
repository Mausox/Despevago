<?php

use Illuminate\Database\Seeder;
use App\CarOption;

class CarOptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CarOption::class, 5)->create();
    }
}
