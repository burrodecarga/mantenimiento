<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CaracteristicaEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristica_equipo', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('equipo_id')->unsigned()->nullable();
            $table->foreign('equipo_id')->references('id')->on('equipos')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->bigInteger('caracteristica_id')->unsigned()->nullable();
            $table->foreign('caracteristica_id')->references('id')->on('caracteristicas')
            ->onDelete('set null')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('caracteristica_equipo');
    }
}
