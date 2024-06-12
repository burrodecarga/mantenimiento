<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use App\User;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    $id=User::all()->pluck('id');
    return [
               'profession'=>$faker->name(),
                'specialty'=>$faker->secondaryAddress(),
                'costo'=>$faker->numberBetween(6000, 9000),
                'twitter'=>$faker->safeEmail(),
                'facebook'=>$faker->freeEmail(),
                'instagram'=>$faker->companyEmail(),
                'linkedin'=>$faker->safeEmail(),
                'youtube'=>$faker->freeEmail(),
                'whatsapp'=>$faker->companyEmail(),
                'wechat'=>$faker->safeEmail(),
                'qq'=>$faker->safeEmail(),
                'qzone'=>$faker->safeEmail(),
                'user_id'=>$faker->randomElement($id),
    ];
});
