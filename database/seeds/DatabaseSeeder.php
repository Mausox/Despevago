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
        $this->call(AirlineTableSeeder::class);
        $this->call(AirlineContactTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(UserTypeTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(UserHistoryTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(BranchOfficeTableSeeder::class);
        $this->call(BranchOfficeContactTableSeeder::class);
        // $this->call(CarTableSeeder::class);
        $this->call(CarOptionTableSeeder::class);

        $this->call(PaymentMethodTableSeeder::class);
        $this->call(PaymentHistoryTableSeeder::class);
        $this->call(TransferCarTableSeeder::class);
        $this->call(HotelTableSeeder::class);
        $this->call(RoomTableSeeder::class);

        $this->call(AirportTableSeeder::class);
        $this->call(ClassTypeTableSeeder::class);
        $this->call(TripTableSeeder::class);
    }
}

