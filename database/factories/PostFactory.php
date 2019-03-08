<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\Blog\Post\Post::class, function (Faker $faker) {
    return [
        'user_id' => \Core\User::all()->random()->id,
        'title' => $faker->sentence(10),
        'post' => $faker->paragraph(200),
        'category_id' => \Blog\Category\Category::all()->random()->id,
    ];
});
