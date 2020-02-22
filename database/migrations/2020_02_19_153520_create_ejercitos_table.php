<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjercitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejercitos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',60);
            $table->integer('civilizacion_id')->unsigned();
            $table->integer('oro');
            $table->timestamps();

            //indices
            $table->foreign('civilizacion_id')->references('id')
                ->on('civilizacions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ejercitos');
    }
}
