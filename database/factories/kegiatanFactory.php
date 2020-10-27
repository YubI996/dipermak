<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\kegiatan;
use App\Models\rt;
use App\Models\jenKeg;
use Faker\Generator as Faker;

$factory->define(kegiatan::class, function (Faker $faker) {

    return [
        'nama_keg' => $faker->text,
        'rt_id' => Rt::all()->random()->id,
        'tgl_mulai' => $faker->word,
        'tgl_selesai' => $faker->word,
        'approval' => $faker->word,
        'jen_keg' => jenKeg::all()->random()->id,
        'pagu' => $faker->word,
        'target' => $faker->word,
        'volume' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
