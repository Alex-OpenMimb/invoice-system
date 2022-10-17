<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number_order');
            $table->unsignedBigInteger('saler_id');
            $table->foreign('saler_id')->references('id')->on('salers');

            $table->unsignedBigInteger('buyer_id');
            $table->foreign('buyer_id')->references('id')->on('buyers');

            $table->date('date');
            $table->time('hour', $precision = 0);
         

            $table->timestamps();
            $table->softDeletes();
           
        });

        Schema::create('saled_products', function (Blueprint $table) {
            $table->id();
       
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');

            $table->integer('amount');
            $table->float('total');

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');


            $table->timestamps();
            $table->softDeletes();
         
        });

        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->date('date_invoice');
            $table->time('hour_invoice', $precision = 0);
            $table->float('before_iva');
            $table->float('iva');
            $table->float('total');

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');


            $table->timestamps();
            $table->softDeletes();
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('sale_products');
        Schema::dropIfExists('invoices');
    }
};
