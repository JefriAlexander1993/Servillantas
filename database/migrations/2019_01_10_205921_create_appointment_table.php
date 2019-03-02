<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     
         Schema::create('appointments', function (Blueprint $table) {
                
                $table->increments('id');
                $table->string('license_plate');
                $table->string('title');
                $table->mediumText('description'); 
                $table->date('date');         
                $table->timeTz('hour_end');
                $table->string('state')->default('No asignada');
                $table->string('attended')->default('No');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id')->references('id')->on('users');
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
            Schema::dropIfExists('appointments');
    }
}
