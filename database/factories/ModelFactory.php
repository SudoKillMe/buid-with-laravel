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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    // static $password;

    return [
        'name' => 'techer',
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('kekealang'),
        // 'password' => $password ?: $password = bcrypt('secret'),
        'score' => rand(0,100),
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {

    return [
        'user_id' => rand(0, 1000),
        'title' => $faker->name,
        'content' => str_random(20),
        'view_count' => rand(0, 100),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
    ];
});
