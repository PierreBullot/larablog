<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
	$posts = App\Post::pluck('id')->toArray();
    return [
        'post_id' => $faker->randomElement($posts),
        'comment_date' => now(),
        'comment_content' => $faker->paragraph(),
        'comment_name' => $faker->word(),
        'comment_email' => $faker->email(),
    ];
});
