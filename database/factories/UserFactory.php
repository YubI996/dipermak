<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\user;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(user::class, function (Faker $faker) {

    return [
        'name' => $name = $faker->word,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => $faker->date('Y-m-d H:i:s'),
        'password' => Hash::make($name),
        'role_id' => $faker->randomDigitNotNull,
        'rt_id' => $faker->randomDigitNotNull,
        'remember_token' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
