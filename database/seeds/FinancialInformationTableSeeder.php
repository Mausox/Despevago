<?php

use Illuminate\Database\Seeder;
use App\FinancialInformation;

class FinancialInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $financial_information = new FinancialInformation();
        $financial_information->bank_name = 'IA BANK';
        $financial_information->number_account = 'IA123';
        $financial_information->balance = 100000;
        $financial_information->user_id = 1;
        $financial_information->save();

        $financial_information = new FinancialInformation();
        $financial_information->bank_name = 'IA Store';
        $financial_information->number_account = 'IA123';
        $financial_information->balance = 100000;
        $financial_information->user_id = 2;
        $financial_information->save();
    }
}
