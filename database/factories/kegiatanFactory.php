<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\kegiatan;
use Faker\Generator as Faker;

$factory->define(kegiatan::class, function (Faker $faker) {

    return [
        'nama_keg' => $faker->text,
        'rt_id' => $faker->randomDigitNotNull,
        'tgl_mulai' => $faker->word,
        'tgl_selesai' => $faker->word,
        'approval' => $faker->word,
        'jen_keg' => $faker->randomDigitNotNull,
        'pagu' => $faker->word,
        'volume' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
