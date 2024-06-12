<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Repuesto;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Repuesto::class, function (Faker $faker) {
    $name='repuesto '.$faker->randomNumber(7,true);
    $unidades=unidades();
    return [
        'name' => $name,
        'slug'=> Str::slug($name),
        'precio'=>$faker->numberBetween(10, 500),
        'marca'=>$faker->company,
        'proveedor'=>$faker->company,
        'description' => $faker->text(200),
        'existencia'=>$faker->numberBetween(1,100),
    ];
});
