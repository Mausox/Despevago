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
            $table->dropForeign('cars_company_id_foreign');
        });

        Schema::table('cars_unavailable', function (Blueprint $table) {
            $table->dropForeign('cars_unavailable_reservation_id_foreign');
        });

        Schema::table('cars_unavailability', function (Blueprint $table) {
            $table->dropForeign('cars_unavailable_car_id_foreign');
        });

        Schema::table('branch_offices', function (Blueprint $table) {
            $table->dropForeign('branch_offices_company_id_foreign');
        });

        Schema::table('branch_offices', function (Blueprint $table) {
            $table->dropForeign('branch_offices_city_id_foreign');
        });

        Schema::table('branch_offices_contact', function (Blueprint $table) {
            $table->dropForeign('branch_offices_contact_branch_office_id_foreign');
        });
    }

}
