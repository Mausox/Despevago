<?php

use Illuminate\Database\Seeder;
use App\Activity;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Activity::class,20)->create();
    }
}
