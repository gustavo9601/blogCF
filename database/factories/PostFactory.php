<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Models\Post::class, function (Faker $faker) {

    $cantidadUsuarios = User::count();  //retorna la cantidad de registors

    return [
        'title' => $faker->name,
        'content' => $faker->text($maxNbChars = 100),
        'user_id' => $faker->numberBetween(1, $cantidadUsuarios)
    ];
});
