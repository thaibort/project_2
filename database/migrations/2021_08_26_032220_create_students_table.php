<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->String('name',100);
            $table->String('address');
            $table->String('phone',20)->unique();
            $table->String('email')->unique();
            $table->tinyInteger('gender');
            $table->date('dob');
            $table->integer('totalStages');
            $table->unsignedBigInteger('idClass');
            $table->unsignedBigInteger('idScholarship');
            $table->foreign('idClass')->references('id')->on('class');
            $table->foreign('idScholarship')->references('id')->on('scholarship');
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
        Schema::dropIfExists('students');
    }
}
