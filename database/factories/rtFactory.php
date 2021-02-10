<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\rt;
use Faker\Generator as Faker;
use \Illuminate\Support\Carbon;
$factory->define(rt::class, function (Faker $faker) {
    static $rt=1;
    
    return [
        'nama_rt' => $rt++,
        'kel_id' => 1,
    ];
});$rt=1;

