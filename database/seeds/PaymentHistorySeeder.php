<?php

use Illuminate\Database\Seeder;
use App\PaymentHistory;

class PaymentHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment_history = new PaymentHistory();
        $payment_history->bank_name = 'IA BANK';
        $payment_history->account_number = 'IA123';
        $payment_history->amount = 100000;
        $payment_history->date = \Carbon\Carbon::now()->toDateString();
        $payment_history->hour = \Carbon\Carbon::now()->toTimeString();;
        $payment_history->user_id = 1;
        $payment_history->save();

        $payment_history = new PaymentHistory();
        $payment_history->bank_name = 'IA Store';
        $payment_history->account_number = 'IA123';
        $payment_history->amount = 20000;
        $payment_history->date = \Carbon\Carbon::now()->toDateString();
        $payment_history->hour = \Carbon\Carbon::now()->toTimeString();;
        $payment_history->user_id = 2;
        $payment_history->save();
    }
}
