<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\jenKeg;
use Faker\Generator as Faker;

$factory->define(jenKeg::class, function (Faker $faker) {

    return [
        'jenis_keg' => $faker->randomElement(['Sarana dan Prasarana Kelurahan','Pemberdayaan Masyarakat Kelurahan']),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
});
