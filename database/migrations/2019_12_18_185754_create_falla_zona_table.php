<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFallaZonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('falla_zona', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('falla_id')->unsigned()->nullable();
            $table->foreign('falla_id')->references('id')->on('fallas')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->bigInteger('zona_id')->unsigned()->nullable();
            $table->foreign('zona_id')->references('id')->on('zonas')
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
        Schema::dropIfExists('falla_zona');
    }
}
