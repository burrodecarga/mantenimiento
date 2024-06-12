<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
             $table->string('slug');
            $table->float('precio', 8, 2)->default(0);
            $table->float('cantidad', 8, 2)->default(1);
            $table->float('total', 8, 2)->default(0);
            $table->string('tipo');
            $table->bigInteger('tipo_id')->unsigned();
            $table->bigInteger('falla_id')->unsigned();
            $table->timestamps();
            $table->foreign('falla_id')->references('id')->on('fallas')
            ->onDelete('cascade')
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
        Schema::dropIfExists('recursos');
    }
}
