<?php
use Illuminate\Database\Seeder;
use App\User;
use App\UserType;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_type_user = UserType::where('name', 'user')->first();
        $user_type_admin  = UserType::where('name', 'admin')->first();

        $user = new User();
        $user->first_name = 'User';
        $user->last_name = 'Novice';
        $user->telephone = '+123456789';
        $user->address = 'where users live #404';
        $user->email = 'user@example.com';
        $user->password = bcrypt('secret');
        $user->user_history_id = 1;
        $user->financial_information_id = 1;
        $user->save();
        $user->user_types()->attach($user_type_user);

        $user = new User();
        $user->first_name = 'Manager';
        $user->last_name = 'Manager';
        $user->telephone = '+123456789';
        $user->address = 'where admins live #Mount Olympus';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->user_history_id = 2;
        $user->financial_information_id = 2;
        $user->save();
        $user->user_types()->attach($user_type_admin);
    }
}