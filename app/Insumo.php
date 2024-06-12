<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
   protected $fillable=[
        'name',
        'precio',
        'existencia',
        'unidad',
        'description',
        'slug',
    ];

    protected $attributes = [
        'unidad' => 'No Asignada',
        'description' => 'Sin Descripción',
     ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_strtolower($value);
    }

    public function setUnidadAttribute($value)
    {
        $this->attributes['unidad'] = mb_strtolower($value);
    }
}
