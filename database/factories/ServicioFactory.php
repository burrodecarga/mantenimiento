<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Servicio;
use Faker\Generator as Faker;

$factory->define(Servicio::class, function (Faker $faker) {
    $name='servicio '.$faker->company.$faker->randomNumber(5,true);;
    $unidades=unidades();
    return [
        'name' => $name,
        'slug'=> Str::slug($name),
        'precio'=>$faker->numberBetween(100, 5000),
        'proveedor'=>$faker->company,
        'description' => $faker->text(200),
    ];
});
