<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatallasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batallas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',60);
            $table->string('lugar',60);
            $table->dateTime('iniciada');
            $table->dateTime('finalizada');
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
        Schema::dropIfExists('batallas');
    }
}
