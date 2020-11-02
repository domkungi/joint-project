<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboundQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbound_quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_for_quotation_id');
            $table->foreign('request_for_quotation_id')->references('id')->on('request_for_quotations');
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->decimal('subtotal', 13, 2);
            $table->decimal('vat', 13, 2);
            $table->decimal('total', 13, 2);
            $table->string('duedate');
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
        Schema::dropIfExists('inbound_quotation');
    }
}
