<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('serial_no')->unique();
            $table->date('date');
            $table->string('patient_name');
            $table->string('phone');
            $table->string('address');
            $table->string('patient_diseases');
            $table->longText('diseases_desc');
            $table->date('reminder_date');
            $table->string('medicine_name');
            $table->string('medicine_use');
            $table->string('medicine_start_date');
            $table->string('medicine_end_date');
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
        Schema::dropIfExists('patients');
    }
}
