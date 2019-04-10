<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Cambios s ele agrego la s
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codes')->unique();
            $table->string('names');
            $table->double('prices');
            $table->mediumtext('bodys');
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
        Schema::dropIfExists('services');
    }
}
