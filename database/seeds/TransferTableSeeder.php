<?php

use Illuminate\Database\Seeder;
use App\Transfer;

class TransferTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Transfer::class,15)->create();
    }
}
