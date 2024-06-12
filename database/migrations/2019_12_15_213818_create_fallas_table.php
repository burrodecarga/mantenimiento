<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFallasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fallas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('falla');
            $table->longText('detalles')->nullable();
            $table->string('condicion')->default('activa');
            $table->bigInteger('equipo_id')->unsigned();
            $table->string('equipo_text')->nullable();
            $table->bigInteger('equipo_servicio')->unsigned()->nullable();
            $table->bigInteger('zona_id')->unsigned()->nullable();
            $table->string('zona_text')->nullable();
            $table->dateTime('fecha');
            $table->time('hora');
            $table->longText('reporte');
            $table->longText('team')->nullable();
            $table->bigInteger('team_id')->nullable();
            $table->bigInteger('team_integrantes')->nullable();
            $table->bigInteger('team_reparadores')->nullable();
            $table->float('team_costo', 8, 2)->default(0);
            $table->datetime('reportada_fecha');
            $table->string('reportada_name')->nullable();
            $table->bigInteger('reportada_id')->nullable();
            $table->string('despejada_name')->nullable();
            $table->datetime('reportada_ok')->nullable();
            $table->bigInteger('despejada')->nullable();
            $table->bigInteger('despejada_id')->nullable();
            $table->bigInteger('falla_duracion')->nullable();
            $table->bigInteger('mes')->default(1);
            $table->foreign('equipo_id')->references('id')->on('equipos')
            ->onDelete('cascade')
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
        Schema::dropIfExists('fallas');
    }
}
