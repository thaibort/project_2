<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->String('name','30');
            $table->integer('phone');
            $table->String('email');
            $table->String('address');
            $table->tinyInteger('gender');
            $table->unsignedBigInteger('idClass');
            $table->unsignedBigInteger('idScholarship');
            $table->foreign('idClass')
                ->references('id')
                ->on('class');
            $table->foreign('idScholarship')
                ->references('id')
                ->on('scholarship');
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
        Schema::dropIfExists('student');
    }
}
