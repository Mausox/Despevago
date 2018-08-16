<?php

use Illuminate\Database\Seeder;
use App\TransferCar;

class TransferCarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TransferCar::class, 10)->create();
    }
}
