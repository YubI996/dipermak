<?php

use Illuminate\Database\Seeder;

class jenKegSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jen_kegs')->insert([
            [
                'id' => 1,
                'jenis_keg' => 'Sarana dan Prasarana Kelurahan'
            ],
            [
                'id' => 2,
                'jenis_keg' => 'Pemberdayaan Masyarakat Kelurahan'
            ]
        ]);
    }
}
