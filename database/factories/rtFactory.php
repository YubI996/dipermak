<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\rt;
use Faker\Generator as Faker;
$rt=1;
$factory->define(rt::class, function (Faker $faker) {

    return [
        'nama_rt' => nomor()->current(),
        'kel_id' => 1,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
function nomor()
{
        yield $i;
        $i += 1;
}
