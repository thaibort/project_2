<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vocation', function (Blueprint $table) {
            $table->id();
            $table->String('name',10);
            $table->unsignedBigInteger('idTotalMoney');
            $table->foreign('idTotalMoney')
                ->references('id')
                ->on('total_money');
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
        Schema::dropIfExists('vocation');
    }
}
