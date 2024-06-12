<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Equipo;
use App\Plan;
use App\Costo;
use App\Estadistica;

class Task extends Model
{

protected $fillable=[
    'plan_id',
    'plan',
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
    'zona'
];

    protected $attributes = [
        'especialidad'=>'mantenimiento general',
        'frecuencia' => 1,
        'duracion' => 1,
        'permisos'=>'no',
        'seguridad'=>'riesgo mínimo',
        'condiciones'=>'maquinaria detenida'
     ];



   public function equipo(){
       return $this->belongsTo(Equipo::class);
   }

   public function plan(){
    return $this->belongsTo(Plan::class);
}

public function tarea_de_equipo(){
    return $this->hasMany(Equipo::class,'equipo_id','id');
}

public function costos(){
    return $this->hasMany(Costo::class);
}
public function estadisticas(){
    return $this->morphMany(Estadistica::class, 'estaticable');
}

}
