<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'uid' => str_random(60),
        'fname' => $faker->firstName(),
        'lname' => $faker->lastName(),
        // 'name' => $faker->unique()->name(),
        'email' => $faker->unique()->safeEmail,
        // 'studentID' => $faker->unique()->numberBetween(600510400,600510900),
        // 'email_verified_at' => now(),
        'password' => bcrypt('password'), // password
        'isAdmin' => $faker->boolean(),
        'token' => null
    ];
});
