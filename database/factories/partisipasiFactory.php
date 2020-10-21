<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\partisipasi;
use Faker\Generator as Faker;

$factory->define(partisipasi::class, function (Faker $faker) {

    return [
        'keg_id' => $faker->randomDigitNotNull,
        'deskripsi' => $faker->text,
        'jenis' => $faker->randomElement(['Barang:barang', 'Jasa:jasa']),
        'nominal' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
