<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->bigInteger('patient_id')->unsigned();
            // $table->integer('invoice_no');
            $table->integer('particular_id');
            $table->string('particular');
            $table->string('rate');
            $table->string('quantity');
            // $table->string('discount')->nullable();
            $table->string('total_amount');
            $table->timestamps();

            // $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
