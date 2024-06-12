<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Equipo;
use App\Falla;
use App\User;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Falla::class, function (Faker $faker) {
   // $equipos=Equipo::all('id','ubicacion','zona_id');
    $equipo = DB::table('equipos')
            ->inRandomOrder()
            ->first();
    $user = DB::table('users')
            ->inRandomOrder()
            ->first();
    $falla='falla '.$faker->randomNumber(7,true);
    $condicion=condicion();
    $fecha=$faker->dateTimeBetween('-1 years', 'now', null);
    $mes=Carbon::parse($fecha);
    $mes=$mes->month;
    $reporte=fallas();
    return [
        'falla'=>$falla,
        'detalles'=>$faker->text(100),
        'condicion'=>$faker->randomElement($condicion),
        'equipo_id'=>$equipo->id,
        'equipo_text'=>$equipo->name,
        'equipo_servicio'=>$equipo->servicio,
        'zona_text'=>$equipo->ubicacion,
        'zona_id'=>$equipo->zona_id,
        'fecha'=>$fecha,
        'mes'=>$mes,
        'hora'=>$faker->time('H:i:s', 'now'),
        'reportada_fecha'=>$fecha,
        'reportada_id'=>$user->id,
        'reportada_name'=>$user->name,
        'despejada_name'=>$faker->name,
        'reporte'=>$faker->randomElement($reporte),
    ];
});
