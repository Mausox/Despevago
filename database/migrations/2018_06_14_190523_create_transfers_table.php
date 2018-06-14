<?php

use Illuminate\Support\Facades\Schema;
use Aejnsn\Postgresify\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transfers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('tansfers_id');
            $table->date('start_date');
            $table->integer('number_people');
            $table->money('price');
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
        Schema::dropIfExists('transfers');
    }
}
