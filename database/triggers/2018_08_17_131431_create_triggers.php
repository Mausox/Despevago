<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //User type default trigger
        DB::unprepared('CREATE TRIGGER tr_user_default_user_type AFTER INSERT ON users FOR EACH ROW EXECUTE PROCEDURE default_user_type();');

        //User balance update after payment history
        DB::unprepared('CREATE TRIGGER tr_add_update_user_balance AFTER INSERT ON payment_histories FOR EACH ROW EXECUTE PROCEDURE add_update_user_balance();');

        //User balance update after reservation closed & create new empty reservation
        DB::unprepared('CREATE TRIGGER tr_reservation_user_balance_update AFTER UPDATE OF closed ON reservations FOR EACH ROW EXECUTE PROCEDURE reservation_user_balance_update();');

        //User empty reservation
        DB::unprepared('CREATE TRIGGER tr_reservation_user_empty_reservation AFTER INSERT ON users FOR EACH ROW EXECUTE PROCEDURE user_empty_reservation();');

        DB::unprepared('CREATE TRIGGER tr_add_empty_room_package AFTER UPDATE OF closed ON reservation_room_flight_package FOR EACH ROW EXECUTE PROCEDURE add_empty_room_package();');

        DB::unprepared('CREATE TRIGGER tr_add_empty_car_package AFTER UPDATE OF closed ON car_flight_package_reservation FOR EACH ROW EXECUTE PROCEDURE add_empty_car_package();');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER tr_user_default_user_type ON users');
        DB::unprepared('DROP TRIGGER tr_add_update_user_balance ON payment_histories');
        DB::unprepared('DROP TRIGGER tr_reservation_user_balance_update ON reservations');
    }
}
