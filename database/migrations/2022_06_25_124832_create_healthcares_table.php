<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthcaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthcares', function (Blueprint $table) {
            $table->id();
            $table->string('centreName');
            $table->string('centreCode');
            $table->string('address');
            $table->string('phone');
            $table->string('optDay');
            $table->string('img');
            $table->decimal('latitude',10,8);
            $table->decimal('longitude', 11, 8);
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
        Schema::dropIfExists('healthcares');
    }
}
