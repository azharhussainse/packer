<?php

use App\Models\Auth\User;
use Faker\Generator;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

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

$factory->define(User::class, function (Generator $faker) {
    return [
        'uuid' => Uuid::uuid4()->toString(),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'username' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('1234'),
        'password_changed_at' => null,
        'remember_token' => Str::random(10),
        'confirmation_code' => md5(uniqid(mt_rand(), true)),
        'active' => true,
        'status' => true,
        'confirmed' => true,
    ];
});

$factory->state(User::class, 'active', function () {
    return [
        'status' => true,
    ];
});

$factory->state(User::class, 'inactive', function () {
    return [
        'status' => false,
    ];
});

$factory->state(User::class, 'confirmed', function () {
    return [
        'confirmed' => true,
    ];
});

$factory->state(User::class, 'unconfirmed', function () {
    return [
        'confirmed' => false,
    ];
});

$factory->state(User::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
