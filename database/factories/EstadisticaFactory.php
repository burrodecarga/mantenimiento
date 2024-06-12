<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Estadistica;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Estadistica::class, function (Faker $faker) {
    $random=rand(1,25);
    $equipo='Equipo-'.$random;
    $fecha=$faker->dateTimeBetween('-1 years', 'now', null);
    $fecha=Carbon::parse($fecha);
    $ff=Carbon::parse($fecha);
    $fechaFin=$ff->addDays(rand(0,7));
    $interval = $fecha->diffInDays($fechaFin);
    $repuestos=$faker->numberBetween(1000, 9000);
    $insumos=$faker->numberBetween(1000, 9000);
    $servicios=$faker->numberBetween(1000, 9000);
    $personal=$faker->numberBetween(1000, 9000);
    $costo=$repuestos+$servicios+$insumos+$personal;
    return [
        'estadisticable_type'=>$faker->randomElement(['App\Falla','App\Task']),
        'estadisticable_id'=>$faker->randomNumber(9,true),
        'equipo_id'=>$random,
        'equipo'=>$equipo,
        'detalles'=>$faker->text(45),
        'fecha_inicio'=>$fecha,
        'fecha_culminacion'=>$fechaFin,
        'tiempo_programado'=>rand(0,3),
        'tiempo_real'=>$interval,
        'repuestos'=>$repuestos,
        'insumos'=>$insumos,
        'servicios'=>$servicios,
        'personal'=>$personal,
        'costo'=>$costo,
    ];
});
