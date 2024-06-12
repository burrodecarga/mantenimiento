<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Equipo;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Equipo::class, function (Faker $faker) {
   $name='Equipo-'.$faker->randomNumber(9,true);
   $zonas=[2,3,4,5];
   $zona_id=$faker->randomElement($zonas);
   $zona='zona_'.$zona_id;
    return [
        'name' => $name,
        'slug'=> Str::slug($name),
        'description' => $faker->text(200),
        "sistema_id"=>1,
        "subsistema_id"=>1,
        "zona_id"=>$zona_id,
        "ubicacion"=>$zona,
        "validador"=>"prueba",
    ];
});
