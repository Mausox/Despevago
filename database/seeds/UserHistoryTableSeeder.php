<?php

use Illuminate\Database\Seeder;
use App\UserHistory;

class UserHistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_history = new UserHistory();
        $user_history->date = '12/12/1192';
        $user_history->hour = '13:32';
        $user_history->action = 'Join';
        $user_history->save();

        $user_history = new UserHistory();
        $user_history->date = '12/12/1192';
        $user_history->hour = '13:32';
        $user_history->action = 'Join';
        $user_history->save();
    }
}
