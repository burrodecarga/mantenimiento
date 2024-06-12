<?php

namespace App;
use App\Subsistema;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    protected $fillable=[
        'name',
        'description',
        'slug',
    ];



    public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_strtolower($value);
    }

    public function subsistemas()
    {
        return $this->hasMany(Subsistema::class);
    }

    public function equipos()
    {
            return $this->hasManyThrough(Equipo::class,Subsistema::class);

    }

    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }

}
