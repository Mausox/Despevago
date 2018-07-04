<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
           $table->foreign('user_history_id')->references('id')->on('user_histories')->onDelete('cascade');
           $table->foreign('financial_information_id')->references('id')->on('financial_informations')->onDelete('cascade');
        });

        Schema::table('reservations', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropForeign(['user_history_id']);
            $table->dropForeign(['financial_information_id']);
        });

        Schema::table('reservations', function (Blueprint $table){
            $table->dropForeign(['user_id']);
        });
    }
}
