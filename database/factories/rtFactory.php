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
        'created_at' => date('Y-m-d H:i:s',strtotime(now())),
        'updated_at' => date('Y-m-d H:i:s',strtotime(now()))
    ];
});$rt=1;

