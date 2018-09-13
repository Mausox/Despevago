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
        factory(UserHistory::class, 20)->create();
        /*
        $user_history = new UserHistory();
        $user_history->date = \Carbon\Carbon::now()->toDateString();
        $user_history->hour = \Carbon\Carbon::now()->toTimeString();
        $user_history->action = 'Join';
        $user_history->user_id = 1;
        $user_history->save();

        $user_history = new UserHistory();
        $user_history->date = \Carbon\Carbon::now()->toDateString();
        $user_history->hour = \Carbon\Carbon::now()->toTimeString();
        $user_history->action = 'Join';
        $user_history->user_id = 2;
        $user_history->save();
        */
    }
}
