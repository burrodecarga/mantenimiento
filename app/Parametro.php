<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    protected $fillable=[ 'name', 'valor','unidad','description','slug'];


    public function scopeName($query, $search)
    {
        if ($search) return $query->orWhere("name", "LIKE", "%$search%");
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_strtolower($value);
    }
    public function setUnidadAttribute($value)
    {
        $this->attributes['unidad'] = mb_strtolower($value);
    }



}
