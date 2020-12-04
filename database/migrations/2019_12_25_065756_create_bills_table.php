<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('patient_id')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('invoiceno');
            $table->date('date');
            $table->integer('grand_total');
            $table->integer('discount');
            $table->integer('vat');
            $table->integer('payable_amount');
            $table->integer('user_id');
            $table->string('issued_by');
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
        Schema::dropIfExists('bills');
    }
}
