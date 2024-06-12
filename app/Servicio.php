<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable=[
        'name',
        'precio',
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

    public function setProveedorAttribute($value)
    {
        $this->attributes['proveedor'] = mb_strtolower($value);
    }


}
