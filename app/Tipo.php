<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Tipoc;
use App\Protocolo;

class Tipo extends Model
{
   protected $fillable=['name','slug'];

   public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_strtolower($value);
    }

 public function equipos(){
     return $this->belongsToMany(Equipo::class);
 }

 public function protocolos(){
     return $this->hasMany(Protocolo::class);
 }

 public function tipocs(){
    return $this->hasMany(Tipoc::class);
}


}
