<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sistema_id')->unsigned();
            $table->bigInteger('subsistema_id')->unsigned();
            $table->string('sistema')->nullable();
            $table->string('subsistema')->nullable();
            $table->bigInteger('plan_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('tipo')->nullable();
            $table->bigInteger('tipo_id')->unsigned()->nullable();
            $table->string('validador');
            $table->string('ubicacion')->nullable();
            $table->bigInteger('zona_id')->unsigned()->nullable();
            $table->integer('servicio')->unsigned()->default(8);
            $table->longText('description')->nullable();
            $table->string('slug');
            $table->timestamps();
            $table->string('falla')->nullable();
            $table->foreign('subsistema_id')->references('id')->on('subsistemas')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('tipo_id')->references('id')->on('tipos')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('zona_id')->references('id')->on('zonas')
            ->onDelete('set null')
            ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
