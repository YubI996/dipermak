<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\dokumentasi;
use App\Models\kegiatan;
use App\Models\rt;

use Faker\Generator as Faker;

$factory->define(dokumentasi::class, function (Faker $faker) {
    $keg = Kegiatan::all()->random();
    return [
        'keg_id' => $keg->id,
        'rt_id' => $keg->rt_id,
        'foto' => 'img\\dok\\default.jpg',
        'keterangan' => $faker->text,
        'progres' => $faker->randomFloat(2,1,100),
        'created_at' => date('Y-m-d H:i:s',strtotime(now())),
        'updated_at' => date('Y-m-d H:i:s',strtotime(now())),
    ];
});
