<?php

use Illuminate\Support\Facades\Schema;
use Aejnsn\Postgresify\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->date('pick_up_date');
            $table->time('pick_up_time');
            $table->date('return_date');
            $table->time('return_time');
            $table->integer('classification');
            $table->money('price');
            $table->timestamps();
            $table->integer('company_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}