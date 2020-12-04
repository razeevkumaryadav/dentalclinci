<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_summaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bill_id')->unsigned();
            $table->string('particular');
            $table->string('quantity');
            $table->integer('rate');
            $table->integer('total_amount');
            
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
        Schema::dropIfExists('bill_summaries');
    }
}
