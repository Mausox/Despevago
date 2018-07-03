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
        $this->call(FinancialInformationTableSeeder::class);
        $this->call(UserHistoryTableSeeder::class);
        // Tipo de usuario es creado antes del usuario.
        $this->call(UserTypeTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
