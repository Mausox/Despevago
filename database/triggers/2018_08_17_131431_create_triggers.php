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

        //User balance update after reservation closed
        DB::unprepared('CREATE TRIGGER tr_reservation_user_balance_update AFTER UPDATE OF closed ON reservations FOR EACH ROW EXECUTE PROCEDURE reservation_user_balance_update();');
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
