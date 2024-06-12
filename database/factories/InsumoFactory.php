<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use App\Insumo;
use Faker\Generator as Faker;

$factory->define(Insumo::class, function (Faker $faker) {
    $name='Insumo '.$faker->randomNumber(7,true);
    $unidades=unidades();
    return [
        'name' => $name,
        'slug'=> Str::slug($name),
        'precio'=>$faker->numberBetween(10, 500),
        'unidad'=>$faker->randomElement($unidades),
        'description' => $faker->text(200),
        'existencia'=>$faker->numberBetween(1,100),
    ];
});
