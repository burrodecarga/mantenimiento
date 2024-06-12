<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    protected $fillable=[
        'name',
        'unidad',
         'valor',
         'simbolo',
         'tipo_id',
         'parametro_id'
        ];

        public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_strtolower($value);
    }

    public function setUnidadAttribute($value)
    {
        $this->attributes['unidad'] = mb_strtolower($value);
    }

    public function equipos(){
        return $this->belongsToMany(Equipo::class);
    }

}
