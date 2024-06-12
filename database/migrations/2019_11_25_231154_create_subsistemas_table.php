<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsistemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsistemas', function (Blueprint $table) {
            $table->bigIncrements('id');
$table->string('sistema')->nullable();

            $table->bigInteger('sistema_id')->unsigned()->default(1);
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('slug');
$table->string('validador')->nullable();

            $table->timestamps();

            $table->foreign('sistema_id')->references('id')->on('sistemas')
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
        Schema::dropIfExists('subsistemas');
    }
}
