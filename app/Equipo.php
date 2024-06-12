<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subsistema;
use App\Tipo;
use App\Image;
use App\Falla;
use App\Zona;
use App\Plan;
use App\Task;

class Equipo extends Model
{
    protected $fillable=[
        'name',
        'description',
        'subsistema_id',
        'sistema_id',
        'sistema',
        'subsistema',
        'tipo',
        'tipo_id',
        'validador',
        'servicio',
        'ubicacion',
        'slug',
        'zona_id',
        'falla',

    ];

    protected $attributes = [
        'servicio' => 10,
        'ubicacion' => 'N/A',
        'zona_id'=>null,
     ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_strtolower($value);
    }

    public function setSistemaAttribute($value)
    {
        $this->attributes['sistema'] = mb_strtolower($value);
    }

    public function setSubsistemaAttribute($value)
    {
        $this->attributes['subsistema'] = mb_strtolower($value);
    }

    public function setTipottribute($value)
    {
        $this->attributes['tipo'] = mb_strtolower($value);
    }



    public function scopeName($query, $search)
    {
        if ($search) return $query->orWhere("name", "LIKE", "%$search%");
    }

    public function subsistema()
    {
        return $this->belongsTo(Subsistema::class);
    }

    public function zona(){
        return $this->belongsTo(Zona::class);
    }

    public function clase(){
        return $this->hasOne(Tipo::class,'id','tipo_id');
    }

    public function caracteristicas(){
        return $this->belongsToMany(Caracteristica::class);
    }

    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }

    public function fallas(){
        return $this->hasMany(Falla::class);
    }

    public function tipo(){
        return $this->hasOne(Tipo::class);
    }

    public function plans(){
        return $this->belongsToMany(Plan::class)->withTimestamps();
    }

    public function tareas_de_equipo(){
        return $this->hasMany(Task::class,'equipo_id','id');
    }


}
