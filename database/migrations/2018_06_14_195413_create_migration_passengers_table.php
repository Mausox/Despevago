<?php

use Illuminate\Support\Facades\Schema;
//use Illuminate\Database\Schema\Blueprint;
use Aejnsn\Postgresify\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMigrationPassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers', function (Blueprint $table) {
            $table->increments('passenger_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('dni');
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
        Schema::dropIfExists('passengers');
    }
}
