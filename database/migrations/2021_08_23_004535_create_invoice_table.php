<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idAdmin');
            $table->unsignedBigInteger('idStudent');
            $table->unsignedBigInteger('idTypeOfTuition');

            $table->foreign('idAdmin')
                ->references('id')
                ->on('admin');
            $table->foreign('idStudent')
                ->references('id')
                ->on('student');
            $table->foreign('idTypeOfTuition')
                ->references('id')
                ->on('type_of_tuition');
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
        Schema::dropIfExists('invoice');
    }
}
