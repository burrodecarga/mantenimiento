<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Falla;

class Recurso extends Model
{
    protected $fillable=[
        'name',
        'slug',
        'precio',
        'cantidad',
        'total',
        'tipo',
        'tipo_id',
        'falla_id',
    ];

    protected $attributes = [

     ];

     public function falla(){
         return $this->belongsTo(Falla::class);
     }

}
