<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_requisition_id');
            $table->foreign('purchase_requisition_id')->references('id')->on('purchase_requisitions');
            $table->unsignedBigInteger('request_for_quotation_id')->nullable();
            $table->foreign('request_for_quotation_id')->references('id')->on('request_for_quotations');
            $table->unsignedBigInteger('inbound_quotation_id')->nullable();
            $table->foreign('inbound_quotation_id')->references('id')->on('inbound_quotations');
            $table->unsignedBigInteger('purchase_order_id')->nullable();
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('qty')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('totalprice')->nullable();
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
        Schema::dropIfExists('items');
    }
}
