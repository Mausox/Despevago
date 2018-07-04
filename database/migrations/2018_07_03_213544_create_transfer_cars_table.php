<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vehicle_registration_number');
            $table->unsignedInteger('capacity');
            $table->integer('category');
            $table->string('company');
            $table->timestamps();
            $table->unsignedInteger('transfer_id');
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
