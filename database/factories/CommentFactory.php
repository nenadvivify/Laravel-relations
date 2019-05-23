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

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraphs(3, true),
        'commentable_id' => $faker->numberBetween(1, 40),
        'commentable_type' => $faker->randomElement(['movie', 'post'])
    ];
});
