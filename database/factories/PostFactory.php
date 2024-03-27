<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Auth\User;
use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'requester_id' => function () {
            return factory(User::class)->state('active')->create()->id;
        },
        'receiver_id' => function () {
            return factory(User::class)->state('active')->create()->id;
        },
        'source' => $faker->randomElement(['Pakistan','United States of America','United Kingdom','UAE','Turkey','Russia']),
        'title' => $faker->paragraph,
        'slug' => $faker->slug,
        'destination' => $faker->randomElement(['Pakistan','United States of America','United Kingdom','UAE','Turkey','Russia']),
        'details' => $faker->paragraph,
        'product_link' => 'https://google.com',
        'type' => $faker->randomElement(['request','travel','shipping','particular']),
        'likes' => $faker->numberBetween(0, 1000),
        'dislikes' => $faker->numberBetween(0, 1000),
        'shares' => $faker->numberBetween(0, 1000),
        'created_by' => function () {
            return factory(User::class)->state('active')->create()->id;
        },
    ];
});
