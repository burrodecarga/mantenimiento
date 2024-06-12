<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHerramientasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('herramientas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->float('precio', 8, 2)->default(0);
            $table->float('existencia', 8, 2)->default(0);
            $table->string('proveedor')->nullable();
            $table->longText('description');
            $table->string('slug');
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
        Schema::dropIfExists('herramientas');
    }
}
