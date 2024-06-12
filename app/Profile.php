<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'card_id',
        'address',
        'phone',
        'movil',
        'profession',
        'specialty',
        'costo',
        'twitter',
        'facebook',
        'instagram',
        'photo'
    ];

    protected $attributes = [
        'costo' => 0,
     ];


    public function setNameAttribute($value)
    {
        $this->attributes['profession'] = mb_strtolower($value);
    }

    public function setsSpecialtyNameAttribute($value)
    {
        $this->attributes['specialty'] = mb_strtolower($value);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
