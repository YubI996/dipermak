<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\dokumentasi;
use App\Models\kegiatan;
use App\Models\rt;

use Faker\Generator as Faker;

$factory->define(dokumentasi::class, function (Faker $faker) {

    return [
        'keg_id' => Kegiatan::all()->random()->id,
        'rt_id' => Rt::all()->random()->id,
        'foto' => $faker->image($dir = '/', $width = 640, $height = 480),
        'keterangan' => $faker->text,
        'created_at' => date('Y-m-d H:i:s',strtotime(now())),
        'updated_at' => date('Y-m-d H:i:s',strtotime(now())),
    ];
});
