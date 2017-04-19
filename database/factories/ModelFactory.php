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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(\App\Models\Post::class, function (\Faker\Generator $faker) {

    return [
        'title' => $faker->title,
        'slug' => $faker->slug,
        'description' => $faker->sentence,
        'content_raw' => $faker->paragraph,
        'content_html' => $faker->paragraph,
        'published_at' => $faker->dateTimeBetween('-2 years', 'now'),
        'is_draft' => random_int(0, 1),
        'author' => 'Zeayal'
    ];

});
