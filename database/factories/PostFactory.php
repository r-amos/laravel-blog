<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraphs(1, true),
        'content' => $faker->paragraphs(4, true),
        'user_id' => rand(1, 200)
    ];
});
