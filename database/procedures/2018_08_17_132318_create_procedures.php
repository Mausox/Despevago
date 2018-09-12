<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE OR REPLACE FUNCTION default_user_type()
        RETURNS trigger AS $$
        BEGIN
        INSERT INTO user_user_type (user_id, user_type_id) VALUES (NEW.id, 2);
        RETURN NULL;
        END;
        $$
        LANGUAGE plpgsql;');

        DB::unprepared('
        CREATE OR REPLACE FUNCTION add_update_user_balance()
        RETURNS trigger AS $$
        BEGIN
        UPDATE users SET current_balance = current_balance + NEW.amount WHERE id = NEW.user_id;
        RETURN NULL;
        END;
        $$
        LANGUAGE plpgsql;');

        DB::unprepared("
        CREATE OR REPLACE FUNCTION reservation_user_balance_update()
        RETURNS trigger AS $$
        BEGIN
        UPDATE users SET current_balance = current_balance - NEW.current_balance WHERE id = NEW.user_id;
        INSERT INTO reservations (created_at, updated_at, user_id, current_balance, new_balance, closed) VALUES (NOW()::timestamp - INTERVAL '3 hours', NOW()::timestamp - INTERVAL '3 hours', NEW.user_id, 0, 0, false);
        RETURN NULL;
        END;
        $$
        LANGUAGE plpgsql;");

        DB::unprepared("
        CREATE OR REPLACE FUNCTION user_empty_reservation()
        RETURNS trigger AS $$
            BEGIN
        INSERT INTO reservations (created_at, updated_at, user_id, current_balance, new_balance, closed) VALUES (NOW()::timestamp - INTERVAL '3 hours', NOW()::timestamp - INTERVAL '3 hours', NEW.id, 0, 0, false);
        RETURN NULL;
        END;
        $$
        LANGUAGE plpgsql;");


        DB::unprepared("
        CREATE OR REPLACE FUNCTION add_empty_room_package()
        RETURNS trigger AS $$
            BEGIN
        INSERT INTO room_flight_packages ( 
   name, start_date, start_hour, end_date, 
   end_hour, discount, city_id, room_id, 
   seat_id, created_at, updated_at
    )
        SELECT name, start_date, start_hour, end_date, 
    end_hour, discount, city_id, null, 
    null, NOW()::timestamp - INTERVAL '3 hours', NOW()::timestamp - INTERVAL '3 hours'
    FROM room_flight_packages WHERE id=NEW.room_flight_package_id AND end_date > NOW()::timestamp - INTERVAL '3 hours';
        RETURN NULL;
        END;
        $$
        LANGUAGE plpgsql;");

        DB::unprepared("
        CREATE OR REPLACE FUNCTION add_empty_car_package()
        RETURNS trigger AS $$
            BEGIN
        INSERT INTO car_flight_packages ( 
   name, start_date, start_hour, end_date, 
   end_hour, discount, city_id, car_id, 
   seat_id, created_at, updated_at
    )
        SELECT name, start_date, start_hour, end_date, 
    end_hour, discount, city_id, null, 
    null, NOW()::timestamp - INTERVAL '3 hours', NOW()::timestamp - INTERVAL '3 hours'
    FROM car_flight_packages WHERE id=NEW.car_flight_package_id AND end_date > NOW()::timestamp - INTERVAL '3 hours';
        RETURN NULL;
        END;
        $$
        LANGUAGE plpgsql;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION IF EXISTS default_user_type() CASCADE;');
        DB::unprepared('DROP FUNCTION IF EXISTS add_update_user_balance() CASCADE;');
        DB::unprepared('DROP FUNCTION IF EXISTS reservation_user_balance_update() CASCADE;');
    }
}
