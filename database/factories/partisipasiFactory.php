<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\partisipasi;
use App\Models\kegiatan;
use App\Models\rt;
use Faker\Generator as Faker;

$factory->define(partisipasi::class, function (Faker $faker) {

    return [
        'keg_id' => Kegiatan::all()->random()->id,
        'rt_id' => Rt::all()->random()->id,
        'deskripsi' => $faker->text,
        'jenis' => $faker->randomElement(['barang','jasa']),
        'nominal' => $faker->randomNumber(5, true),
        'created_at' => date('Y-m-d H:i:s',strtotime(now())),
        'updated_at' => date('Y-m-d H:i:s',strtotime(now())),
    ];
});
