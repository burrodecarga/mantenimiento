<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('task_id')->unsigned()->nullable();
            $table->bigInteger('costo_id')->unsigned()->nullable();
            $table->string('costo_tipo')->nullable();
            $table->string('name')->nullable();
            $table->float('cantidad', 8, 2)->default(0);
            $table->float('precio', 8, 2)->default(0);
            $table->float('total', 8, 2)->default(0);
            $table->foreign('task_id')->references('id')->on('tasks')
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
        Schema::dropIfExists('costos');
    }
}
