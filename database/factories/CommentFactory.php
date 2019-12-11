<?php

use Faker\Generator as Faker;
use App\User;
use App\Models\Post;

$factory->define(\App\Models\Comment::class, function (Faker $faker) {

    $cantidadUsuarios = User::count();
    $cantidadPosts = Post::count();

    return [
        'content' => $faker->text($maxNbChars = 100),
        'user_id' => $faker->numberBetween(1, $cantidadUsuarios),
        'post_id' => $faker->numberBetween(1, $cantidadPosts),
    ];
});
