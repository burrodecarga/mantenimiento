<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subsistema;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Subsistema::class, function (Faker $faker) {
    $name= '-'.$faker->address.'*'.$faker->name;
    return [
        'name' =>$name,
        'slug'=>Str::slug($name),
        'description' => $faker->text(200),


    ];
});
