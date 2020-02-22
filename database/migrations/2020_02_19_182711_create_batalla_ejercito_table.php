<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatallaEjercitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batalla_ejercito', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('batalla_id')->unsigned();
            $table->foreign('batalla_id')->references('id')
                ->on('batallas')->onDelete('cascade');

            $table->integer('ejercito_id')->unsigned();
            $table->foreign('ejercito_id')->references('id')
                ->on('ejercitos')->onDelete('cascade');

            $table->boolean('ganador');
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
        Schema::dropIfExists('batalla_ejercito');
    }
}
