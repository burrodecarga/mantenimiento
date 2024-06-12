<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('fecha_inicio');
            $table->time('hora_inicio');
            $table->integer('turnos_laborables')->default(1);
            $table->integer('jornada_semanal')->default(44);
            $table->integer('jornada_diaria')->default(8);
            $table->integer('laborar_feriado')->default(0);
            $table->integer('laborar_sobretiempo')->default(0);
            $table->time('hora_descanso');
            $table->integer('horas_descanso')->default(1);
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
        Schema::dropIfExists('plans');
    }
}
