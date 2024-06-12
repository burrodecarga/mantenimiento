<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tipo;


class Tipoc extends Model
{

    protected $fillable=['name','valor','unidad','simbolo','tipo_id','parametro_id','slug'];


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_strtolower($value);
    }

    public function setUnidadAttribute($value)
    {
        $this->attributes['unidad'] = mb_strtolower($value);
    }



    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }


}
