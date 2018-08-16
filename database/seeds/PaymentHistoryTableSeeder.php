<?php

use Illuminate\Database\Seeder;
use App\PaymentHistory;

class PaymentHistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PaymentHistory::class,10)->create();
    }
}
