<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->id();
            $table->String('name',20);
            $table->unsignedBigInteger('idTotalMoney');
            $table->unsignedBigInteger('idSchoolYear');
            $table->foreign('idTotalMoney')->references('id')->on('total_money');
            $table->foreign('idSchoolYear')->references('id')->on('school_year');
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
        Schema::dropIfExists('class');
    }
}
