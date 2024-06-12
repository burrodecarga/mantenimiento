<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    protected $fillable=[
        'plan_id',
        'plan',
        'task_id',
        'tarea',
        'tarea_tipo',
        'protocolo',
        'especialidad',
        'frecuencia',
        'periocidad',
        'duracion',
        'permisos',
        'condiciones',
        'detalles',
        'tipo',
        'tipo_id',
        'seguridad',
        'planequipo',
        'equipo_id',
        'equipo_text',
        'team',
        'team_id',
        'responsable_id',
        'responsable',
        'tarea_posicion',
        'tarea_restriccion',
        'fecha_inicio',
        'hora_inicio',
        'fecha_fin',
        'hora_fin',
        'zona_id',
        'zona',
        'title',
        'start',
        'end',
        'color',
        'allDay',
    ];

    protected $attributes = [
            'especialidad'=>'mantenimiento general',
            'frecuencia' => 1,
            'duracion' => 1,
            'permisos'=>'no',
            'seguridad'=>'riesgo mínimo',
            'condiciones'=>'maquinaria detenida',
            'title'=>'evento programado',
            'allDay'=>0,
         ];






}
