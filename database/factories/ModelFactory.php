<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Http\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('qwerty'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Http\Models\Article::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->realText(50),
        'content' => $faker->realText(1024),
        'user_id' =>mt_rand(1,10),
    ];
});

$factory->define(App\Http\Models\Tag::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,     
    ];
});

$factory->define(App\Http\Models\Comment::class, function (Faker\Generator $faker) {

    return [
        'text' => $faker->realText(50),
        'user_id' =>mt_rand(1,10),
    ];
});
