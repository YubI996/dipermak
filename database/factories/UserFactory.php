<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\user;
use Faker\Generator as Faker;

$factory->define(user::class, function (Faker $faker) {

    // return [
    //     'name' => $faker->word,
    //     'email' => $faker->email,
    //     'email_verified_at' => $faker->word,
    //     'password' => $faker->word,
    //     'role_id' => $faker->randomDigitNotNull,
    //     'rt_id' => $faker->randomDigitNotNull,
    //     'foto' => $faker->word,
    //     'remember_token' => $faker->word,
    //     'created_at' => $faker->date('Y-m-d H:i:s'),
    //     'updated_at' => $faker->date('Y-m-d H:i:s'),
    //     'deleted_at' => $faker->date('Y-m-d H:i:s')
    // ];
    return [
        'name' => 'Yubi',
            'email' => 'yubi@yubi.com',
            'password' => Hash::make('yubiyubi'),
            'role_id' => 1,
            'rt_id' => 75,
    ];
});
