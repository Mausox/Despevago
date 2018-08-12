<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Tipo de usuario es creado antes del usuario.
        $this->call(UserTypeTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(UserHistoryTableSeeder::class);
        $this->call(PaymentHistorySeeder::class);
    }
}
