<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sistema;
use App\Equipo;

class Subsistema extends Model
{
    protected $fillable=[
        'name',
        'description',
        'sistema_id',
        'validador',
        'sistema',
        'slug',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_strtolower($value);
    }

    public function setSistemaAttribute($value)
    {
        $this->attributes['sistema'] = mb_strtolower($value);
    }

    public function sistemas()
    {
        return $this->belongsTo(Sistema::class);
    }

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }

    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }

}
