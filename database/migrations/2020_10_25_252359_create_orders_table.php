<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->unsignedBigInteger('inquiry_id');
            $table->foreign('inquiry_id')->references('id')->on('inquiries');
           $table->unsignedBigInteger('quotation_id')->nullable();
            $table->foreign('quotation_id')->references('id')->on('quotations');
            $table->unsignedBigInteger('sale_order_id')->nullable();
            $table->foreign('sale_order_id')->references('id')->on('sale_orders');
            $table->unsignedBigInteger('picking_id')->nullable();
            $table->foreign('picking_id')->references('id')->on('pickings');
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('qty')->nullable();
            $table->decimal('price',13,2)->nullable();
             $table->decimal('discount',13,2)->default(0);
            $table->decimal('totalprice',13,2)->nullable(); 
            
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
        Schema::dropIfExists('orders');
    }
}
