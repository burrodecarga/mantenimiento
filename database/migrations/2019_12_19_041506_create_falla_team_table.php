<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFallaTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('falla_team', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('falla_id')->unsigned()->nullable();
            $table->foreign('falla_id')->references('id')->on('fallas')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->bigInteger('team_id')->unsigned()->nullable();
            $table->foreign('team_id')->references('id')->on('teams')
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
        Schema::dropIfExists('falla_team');
    }
}
