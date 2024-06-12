<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Profile;
use App\Zona;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','card_id','address',
        'phone','movil','plus','avatar','zona_id','area','zona'
    ];

    protected $attributes = [
        'avatar' =>'avatar.jpg',
        'area' => 'operativa',
        'zona_id'=>2,
        'zona'=>'todas las zonas',
       // 'zona'=>'no asignada',
     ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setNameAttribute($value) {
        $this->attributes['name'] = mb_strtolower($value);
    }

    public function teams(){
        return $this->belongsToMany(Team::class)->withTimestamps();
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function zona(){
        return $this->belongsTo(Zona::class);
    }
}
