<?php

use Illuminate\Database\Seeder;
use App\PaymentMethod;

class PaymentMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PaymentMethod::class,10)->create();
    }
}
