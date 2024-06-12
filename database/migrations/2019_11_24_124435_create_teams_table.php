<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('name');
             $table->string('responsable')->nullable();
             $table->bigInteger('responsable_id')->nullable();
             $table->string('kind')->default('general maintenance');
             $table->integer('integrantes')->default(0);
             $table->float('costo', 8, 2)->default(0);
             $table->string('description')->nullable();
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
        Schema::dropIfExists('teams');
    }
}
