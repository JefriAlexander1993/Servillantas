<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_products', function (Blueprint $table) {
              $table->increments('id');
              $table->integer('quantity');
              $table->float('price');
              $table->float('total');
              $table->integer('sale_id')->unsigned()->nullable();       
              $table->integer('product_id')->unsigned()->nullable();
               $table->integer('service_id')->unsigned()->nullable();
                 
                 $table->foreign('sale_id')->references('id')->on('sales')
                 ->onUpdate('cascade')->onDelete('cascade');
                 $table->foreign('product_id')->references('id')->on('products')
                     ->onUpdate('cascade')->onDelete('cascade');

                 $table->foreign('service_id')->references('id')->on('services')
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
        Schema::dropIfExists('sales_products');
    }
}
