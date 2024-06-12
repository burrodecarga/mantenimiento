<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Falla;

class Team extends Model
{

    protected $fillable = [
        'name', 'kind', 'description','integrantes','costo','responsable_id','responsable'  ];

    protected $attributes = [
        'integrantes' => 1,
        'costo'=>0,
     ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_strtolower($value);
    }

    public function setKindAttribute($value)
    {
        $this->attributes['kind'] = mb_strtolower($value);
    }

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function fallas(){
        return $this->belongsToMany(Falla::class)->withTimestamps();
    }


}
