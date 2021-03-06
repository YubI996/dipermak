<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\partisipasi;
use App\Models\kegiatan;
use App\Models\rt;
use Faker\Generator as Faker;

$factory->define(partisipasi::class, function (Faker $faker) { 
    $keg = Kegiatan::all()->random();
    return [
        'keg_id' => $keg->id,
        'rt_id' => $keg->rt_id,
        'deskripsi' => $faker->text,
        'jenis' => $faker->randomElement(['Barang','Jasa','Uang']),
        'nominal' => intval($keg->target * 0.85),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
});
