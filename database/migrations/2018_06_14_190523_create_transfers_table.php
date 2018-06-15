<?php

use Illuminate\Support\Facades\Schema;
use Aejnsn\Postgresify\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('tansfer_id');
            $table->date('start_date');
            $table->integer('number_people');
            $table->money('price');
            $table->timestamps();
            $table->unsignedInteger('hotel_id');
            $table->unsignedInteger('airport_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
}
