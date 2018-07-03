<?php

use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_type = new \App\UserType();
        $user_type->name = 'admin';
        $user_type->description = 'Admin is a God';
        $user_type->save();

        $user_type = new \App\UserType();
        $user_type->name = 'user';
        $user_type->description = 'User is a Slave';
        $user_type->save();
    }
}
