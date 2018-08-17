<?php

use Illuminate\Database\Seeder;
use App\BranchOfficeContact;

class BranchOfficeContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BranchOfficeContact::class, 10)->create();
    }
}
