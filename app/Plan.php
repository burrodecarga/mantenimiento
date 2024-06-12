<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Equipo;
use App\Task;

class Plan extends Model
{
    protected $fillable=[
        'name' ,
        'fecha_inicio',
        'hora_inicio',
        'turnos_laborables',
        'jornada_semanal',
        'jornada_diaria',
        'laborar_feriado',
        'laborar_sobretiempo',
        'horas_descanso',
        'hora_descanso',

    ];

    protected $attributes = [
        'hora_inicio'=>'07:00',
        'hora_descanso'=>'12:00',
        'horas_descanso'=>30,
        'fecha_inicio'=>'01/01/2020',
        'jornada_diaria'=>8,
        'jornada_semanal'=>44
     ];

     public function equipos(){
         return $this->belongsToMany(Equipo::class)->withTimestamps();
     }

     public function tasks(){
         return $this->hasMany(Task::class)->orderBy('frecuencia','asc');
     }
}
