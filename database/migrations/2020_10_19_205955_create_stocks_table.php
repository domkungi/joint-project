<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('storage_id');
            $table->foreign('storage_id')->references('id')->on('storages');
            $table->unsignedBigInteger('goods_receipt_id')->nullable();
            $table->foreign('goods_receipt_id')->references('id')->on('goods_receipts');
            /*$table->unsignedBigInteger('goods_issue_id')->nullable();
            $table->foreign('goods_issue_id')->references('id')->on('goods_issues');*/
            
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('inbound_qty')->nullable();
            $table->integer('outbound_qty')->nullable();
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
        Schema::dropIfExists('stocks');
    }
}
