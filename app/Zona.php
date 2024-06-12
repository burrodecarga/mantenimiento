<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Equipo;
use App\User;
use App\Falla;

class Zona extends Model
{
    protected $fillable=[ 'name','slug'];


    public function scopeName($query, $search)
    {
        if ($search) return $query->orWhere("name", "LIKE", "%$search%");
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_strtolower($value);
    }

    public function equipos(){
        return $this->hasMany(Equipo::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function fallas(){
        return $this->belongsToMany(Falla::class);
    }
}
