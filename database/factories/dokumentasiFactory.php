<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\dokumentasi;
use Faker\Generator as Faker;

$factory->define(dokumentasi::class, function (Faker $faker) {

    return [
        'keg_id' => $faker->randomDigitNotNull,
        'foto' => $faker->word,
        'keterangan' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
