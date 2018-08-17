<?php

use Illuminate\Database\Seeder;
use App\BranchOffice;

class BranchOfficeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BranchOffice::class, 10)->create();
    }
}
