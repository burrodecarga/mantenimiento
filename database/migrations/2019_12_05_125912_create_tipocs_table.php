<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipocs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('valor')->nullable();
            $table->string('unidad')->nullable();
            $table->string('simbolo')->nullable();
            $table->bigInteger('tipo_id')->unsigned()->nullable();
            $table->bigInteger('parametro_id')->unsigned()->nullable();
            $table->string('slug');
            $table->timestamps();

            $table->foreign('tipo_id')->references('id')->on('tipos')
            ->onDelete('cascade')
            ->onUpdate('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipocs');
    }
}
