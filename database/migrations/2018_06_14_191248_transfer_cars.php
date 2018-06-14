<?php

use Illuminate\Support\Facades\Schema;
use Aejnsn\Postgresify\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransferCars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_cars', function (Blueprint $table) {
            $table->increments('transfer_cars_id');
            $table->string('vehicle_registration_number');
            $table->integer('capacity');
            $table->integer('category');
            $table->string('company');
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
        Schema::dropIfExists('transfer_cars');
    }
}
