<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Auth\User;
use App\Models\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3, true),
        'slug' => $faker->slug,
        'content' => $faker->paragraph,
        'publish_datetime' => $faker->dateTime,
        'meta_title' => $faker->words(3, true),
        'cannonical_link' => $faker->url,
        'featured_image' => rand(1,6).'.jpg',
        'meta_keywords' => $faker->word,
        'meta_description' => $faker->paragraph,
        'status' => $faker->numberBetween(0, 3),
        'source' => $faker->words(3, true),
        'political_spectrum' => $faker->randomElement(['C', 'RL','R','LL','L']),
        'likes' => $faker->numberBetween(0, 1000),
        'dislikes' => $faker->numberBetween(0, 1000),
        'shares' => $faker->numberBetween(0, 1000),
        'created_by' => function () {
            return factory(User::class)->state('active')->create()->id;
        },
    ];
});
