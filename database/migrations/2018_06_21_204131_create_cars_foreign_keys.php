<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
        });

        Schema::table('unavailable_cars', function (Blueprint $table) {
            $table->foreign('reservation_id')->references('reservation_id')->on('reservations')->onDelete('cascade');
            $table->foreign('car_id')->references('car_id')->on('cars')->onDelete('cascade');
        });

        Schema::table('branch_offices', function (Blueprint $table) {
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->foreign('city_id')->references('city_id')->on('cities')->onDelete('cascade');
        });

        Schema::table('branch_offices_contact', function (Blueprint $table) {
            $table->foreign('branch_office_id')->references('branch_office_id')->on('branch_offices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

        Schema::table('cars', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
        });

        Schema::table('unavailable_cars', function (Blueprint $table) {
            $table->dropForeign(['reservation_id']);
            $table->dropForeign(['car_id']);
        });

        Schema::table('branch_offices', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropForeign(['company_id']);
        });

        Schema::table('branch_offices_contact', function (Blueprint $table) {
            $table->dropForeign(['branch_office_id']);
        });
    }

}
