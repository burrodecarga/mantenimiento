<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Equipo;
use App\Zona;
use App\Team;
use App\Recurso;
use App\Image;
use App\Estadistica;

class Falla extends Model
{
    protected $fillable=[
        'falla',
        'equipo_id',
        'equipo_text',
        'equipo_servicio',
        'fecha',
        'hora',
        'reporte',
        'reportada_fecha',
        'reportada_id',
        'reportada_name',
        'detalles',
        'condicion',
        'zona_text',
        'zona_id',
        'team',
        'team_id',
        'team_integrantes',
        'team_reparadores',
        'team_costo',
        'despejada_name',
        'despejada_id',
        'falla_duracion',
        'reportada_ok',
        'despejada',
        'mes',

    ];

    protected $attributes = [
        'detalles' => 'Sin detalles',
        'condicion' =>'activa',
        'despejada'=>0,
        'mes'=>1
     ];

    public function setFallaAttribute($value)
    {
        $this->attributes['falla'] = mb_strtolower($value);
    }

    public function setDetalleAttribute($value)
    {
        $this->attributes['detalle'] = mb_strtolower($value);
    }

    public function equipo(){
        return $this->belongsTo(Equipo::class);
    }

    public function zonas(){
        return $this->belongsToMany(Zona::class)->withTimestamps();
    }

    public function teams(){
        return $this->belongsToMany(Team::class)->withTimestamps();
    }

    public function recursos(){
        return $this->hasMany(Recurso::class);
    }

    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }

    public function estadisticas(){
        return $this->morphMany(Estadistica::class, 'estaticable');
    }


}
