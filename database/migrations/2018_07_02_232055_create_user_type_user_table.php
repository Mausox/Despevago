<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTypeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // This is an intermediate table -> user_types with users
    public function up()
    {
        Schema::create('user_type_user', function (Blueprint $table) {
            $table->increments('user_type_user_id');
            $table->integer('user_type_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_type_user');
    }
}
