<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_plan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('plan_id')->unsigned()->nullable();
            $table->foreign('plan_id')->references('id')->on('plans')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->bigInteger('equipo_id')->unsigned()->nullable();
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
        Schema::dropIfExists('equipo_plan');
    }
}
