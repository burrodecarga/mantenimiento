<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('plan_id')->unsigned()->nullable();
            $table->string('plan')->nullable();
            $table->bigInteger('activa')->unsigned()->default(1);
            $table->bigInteger('equipo_id')->unsigned()->nullable();
            $table->bigInteger('tipo_id')->unsigned()->nullable();
            $table->bigInteger('team_id')->unsigned()->nullable();
            $table->bigInteger('zona_id')->unsigned()->nullable();
            $table->bigInteger('responsable_id')->unsigned()->nullable();
            $table->bigInteger('tarea_posicion')->unsigned()->nullable();
            $table->bigInteger('tarea_restriccion')->unsigned()->null();
            $table->string('equipo_text')->nullable();
            $table->string('tipo')->nullable();
            $table->string('team')->nullable();
            $table->string('responsable')->nullable();
            $table->string('zona')->nullable();
            $table->string('personal')->nullable();
            $table->string('tarea_tipo');
            $table->string('tarea');
            $table->longText('detalles')->nullable();
            $table->string('protocolo')->default('genérico');
            $table->string('especialidad')->default('mantenimiento general');
            $table->bigInteger('frecuencia')->unsigned();
            $table->string('periocidad')->default('diario');
            $table->string('permisos')->default('N/A');
            $table->string('seguridad')->default('N/A');
            $table->string('condiciones')->default('maquinaria detenida');
            $table->date('fecha_inicio');
            $table->time('hora_inicio');
            $table->date('fecha_fin');
            $table->time('hora_fin');
            $table->bigInteger('duracion')->unsigned()->default(1);
            $table->bigInteger('avance')->unsigned()->default(0);
            $table->bigInteger('realizada')->unsigned()->default(0);

            $table->foreign('plan_id')->references('id')->on('plans')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->foreign('equipo_id')->references('id')->on('equipos')
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
        Schema::dropIfExists('tasks');
    }
}
