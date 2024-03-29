<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccinations', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('patientName');
            $table->string('batchNo');
            $table->date('appointmentDate');
            $table->enum('vaccineDose',['1 Dose', '2 Dose', 'Booster']);
            $table->enum('status', ['Pending', 'Confirm', 'Administered', 'Reject'])->default('Pending');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('vaccinations');
    }
}
