<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\kecamatan;
use Faker\Generator as Faker;

$factory->define(kecamatan::class, function (Faker $faker) {

    return [
        'nama_kec' => $faker->word,
        'kota_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
