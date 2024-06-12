<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tipo;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Tipo::class, function (Faker $faker) {
    $nombre= $faker->unique()->streetName;

    return [
        'name' =>$nombre,
        'slug' =>Str::slug($nombre),
        ];
});
