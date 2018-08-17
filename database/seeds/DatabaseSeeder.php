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
        $this->call(CompanyTableSeeder::class);
        // $this->call(CarTableSeeder::class);
        $this->call(CarOptionTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(PaymentMethodTableSeeder::class);
        $this->call(PaymentHistoryTableSeeder::class);
        $this->call(TransferCarTableSeeder::class);
        $this->call(ClassTypeTableSeeder::class);
        $this->call(TripTableSeeder::class);
    }
}

