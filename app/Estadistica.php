<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadistica extends Model
{
    protected $fillable=[
        'id',
        'estadisticable',
        'equipo_id',
        'equipo',
        'detalles',
        'fecha_inicio',
        'fecha_culminacion',
        'tiempo_programado',
        'tiempo_real',
        'repuestos',
        'insumos',
        'servicios',
        'personal',
        'costo',
    ];

    public function estaticable(){
        return $this->morphTo();
    }
}
