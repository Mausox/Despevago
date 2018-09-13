<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['name' => 'Santiago', 'country_id' => '45'],
            ['name' => 'Iquique', 'country_id' => '45'],
            ['name' => 'Los Angeles', 'country_id' => '236'],
            ['name' => 'San Francisco', 'country_id' => '236'],
            ['name' => 'Brasilia', 'country_id' => '32'],
            ['name' => 'Buenos Aires', 'country_id' => '11'],
        ];
        DB::table('cities')->insert($cities);
    }
}
