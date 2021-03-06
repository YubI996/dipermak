<?php

use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kecamatans')->insert([
            [
                'id' => 1,
                'nama_kec' => 'Bontang Barat',
                'kota_id' => 1
            ],
            [
                'id' => 2,
                'nama_kec' => 'Bontang Selatan',
                'kota_id' => 1
            ],
            [
                'id' => 3,
                'nama_kec' => 'Bontang Utara',
                'kota_id' => 1
            ]
        ]);
    }
}
