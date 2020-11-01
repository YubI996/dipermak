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
        'tgl_mulai' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 month', $timezone = null),
        'tgl_selesai' => $faker->dateTimeBetween($startDate = '+1 moth', $endDate = '+2 month', $timezone = null),
        'approval' => $faker->boolean,
        'jen_keg' => jenKeg::all()->random()->id,
        'pagu' => $faker->randomNumber(6,false),
        'target' => $faker->randomNumber(5, true),
        'volume' => $faker->randomNumber(2,false),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        
    ];
});
