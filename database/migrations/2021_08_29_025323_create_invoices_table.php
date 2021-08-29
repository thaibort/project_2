<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idStudents');
            $table->unsignedBigInteger('idAdmin');
            $table->unsignedBigInteger('idTypeOfTuition');
            $table->dateTimeTz('date');
            $table->float('money');
            $table->foreign('idStudents')->references('id')->on('students');
            $table->foreign('idAdmin')->references('id')->on('admins');
            $table->foreign('idTypeOfTuition')->references('id')->on('type_of_tuition');
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
        Schema::dropIfExists('invoices');
    }
}
