<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                
        Schema::create('users_products', function (Blueprint $table) {

             $table->increments('id');
             $table->integer('user_id')->unsigned();
             $table->integer('product_id')->unsigned();
             
             $table->float('costTotal');
            
             $table->foreign('user_id')->references('id')->on('users')
                     ->onUpdate('cascade')->onDelete('cascade');

             $table->foreign('product_id')->references('id')->on('products')
                          ->onUpdate('cascade')->onDelete('cascade');

             

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
                Schema::dropIfExists('users_products');
    }
}
