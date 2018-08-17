<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_types');
        $types = [
            ['name' => 'Tourist', 
            'created_at' => Carbon::now()->toDateString(), 
            'updated_at' => Carbon::now()->toDateString()],
            ['name' => 'Bussines',
            'created_at' => Carbon::now()->toDateString(), 
            'updated_at' =>Carbon::now()->toDateString()],
            ['name' => 'First class',
            'created_at' => Carbon::now()->toDateString(), 
            'updated_at' =>Carbon::now()->toDateString()]
        ];
        DB::table('class_types')->insert($types);
    }
}
