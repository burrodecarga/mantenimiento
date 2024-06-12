<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtocolosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocolos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_text')->nullable();
            $table->bigInteger('tipo_id')->unsigned()->nullable();
            $table->string('protocolo')->default('genérico');
            $table->string('tarea_tipo');
            $table->string('tarea');
            $table->bigInteger('tarea_posicion')->unsigned()->nullable();
            $table->bigInteger('tarea_restriccion')->unsigned()->nullable();
            $table->string('especialidad')->default('mantenimiento general');
            $table->integer('frecuencia')->default(1);
            $table->integer('duracion')->default(1);
            $table->string('permisos')->default('N/A');
            $table->string('seguridad')->default('N/A');
            $table->string('condiciones')->default('maquinaria detenida');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('tipo_id')->references('id')->on('tipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('protocolos');
    }
}
