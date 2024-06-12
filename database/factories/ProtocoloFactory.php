<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Protocolo;
use App\Tipo;
use Faker\Generator as Faker;

$factory->define(Protocolo::class, function (Faker $faker) {

    $tp=tipo_de_protocolo();
    $tarea_tipo=tipo_de_tarea();
    $autorizacion=autorizacion();
    $especialidad=especialidad();
    $frecuencia=frecuencia();
    $seguridad=seguridad();
    $condiciones=condiciones();
    $tipos_de_equipo=Tipo::inRandomOrder()->get()->first();

    $tipo_text=$tipos_de_equipo->name;
    $tipo_id=$tipos_de_equipo->id;

    return [
     'tarea_tipo'=>$faker->randomElement($tarea_tipo),
     'tipo_text'=>$tipo_text,
     'tipo_id'=>$tipo_id,
     'permisos'=>$faker->randomElement($autorizacion),
     'protocolo'=>$faker->randomElement($tp),
     'tarea'=>$faker->text(30),
     'especialidad'=>$faker->randomElement($especialidad),
     'frecuencia'=>$faker->randomElement($frecuencia),
     'duracion'=>$faker->numberBetween(1,8),
     'permisos'=>$faker->randomElement($autorizacion),
     'condiciones'=>$faker->randomElement($condiciones),
     'seguridad'=>$faker->randomElement($seguridad),
     'description'=>$faker->text(100),
    ];
});
