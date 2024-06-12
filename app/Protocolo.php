<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tipo;

class Protocolo extends Model
{
    protected $fillable=[
        'tipo_text',
        'tipo_id',
        'protocolo',
        'tarea_tipo',
        'tarea',
        'tarea_posicion',
        'tarea_restriccion',
        'especialidad',
        'frecuencia',
        'duracion',
        'permisos',
        'condiciones',
        'description',
        'tipo',
        'seguridad',


    ];

    protected $attributes = [
        'especialidad'=>'mantenimiento general',
        'frecuencia' => 1,
        'duracion' => 1,
        'permisos'=>'no',
        'seguridad'=>'riesgo mínimo',
        'condiciones'=>'maquinaria detenida',

     ];


    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }
}



