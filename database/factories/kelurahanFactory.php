<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\kelurahan;
use Faker\Generator as Faker;

$factory->define(kelurahan::class, function (Faker $faker) {

    return [
        'nama_kel' => $faker->word,
        'kec_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
