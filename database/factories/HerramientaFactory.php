<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Herramienta;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Herramienta::class, function (Faker $faker) {
    $name='herramienta '.$faker->randomNumber(7,true);
    $unidades=unidades();
    return [
        'name' => $name,
        'slug'=> Str::slug($name),
        'precio'=>$faker->numberBetween(10, 500),
        'proveedor'=>$faker->company,
        'description' => $faker->text(200),
        'existencia'=>$faker->numberBetween(1,100),
    ];
});
