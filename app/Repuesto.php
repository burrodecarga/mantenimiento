<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    protected $fillable=[
        'name',
        'precio',
        'existencia',
        'proveedor',
        'description',
        'slug',
    ];

    protected $attributes = [
        'proveedor' => 'No Asignado',
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

    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
}
