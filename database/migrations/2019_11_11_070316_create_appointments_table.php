<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('appointment_id');
            $table->bigInteger('dentist_id');
            $table->bigInteger('patient_id');
            $table->string('type');
            $table->date('appointment_date')->nullable();
            $table->string('appointment_time')->nullable();
            $table->string('start');
            $table->string('end')->nullable();
            $table->text('notes')->nullable();
            $table->text('notes_dentist')->nullable();
            $table->bigInteger('cancelled')->nullable();
            $table->bigInteger('finished')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
