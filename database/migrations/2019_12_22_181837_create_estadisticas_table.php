<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadisticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadisticas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('estadisticable');
            $table->bigInteger('equipo_id')->nullable();
            $table->string('equipo')->nullable();
            $table->string('detalles')->nullable();
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_culminacion');
            $table->float('tiempo_programado', 8, 2)->default(8);
            $table->float('tiempo_real', 8, 2)->default(0);
            $table->float('repuestos', 8, 2)->default(0);
            $table->float('insumos', 8, 2)->default(0);
            $table->float('servicios', 8, 2)->default(0);
            $table->float('personal', 8, 2)->default(0);
            $table->float('costo', 8, 2)->default(0);
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
        Schema::dropIfExists('estadisticas');
    }
}
