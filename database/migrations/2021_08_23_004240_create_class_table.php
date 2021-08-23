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
            $table->String('name');
            $table->unsignedBigInteger('idVocation');
            $table->unsignedBigInteger('idCoursework');
            $table->timestamps();
            $table->foreign('idVocation')
                ->references('id')
                ->on('vocation');
            $table->foreign('idCoursework')
                ->references('id')
                ->on('coursework');
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
