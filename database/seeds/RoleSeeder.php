<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['nama_role' => 'admin_super'],
            ['nama_role' => 'pelaksana'],
            ['nama_role' => 'pembina'],
            ['nama_role' => 'pokmas'],
            ['nama_role' => 'kecamatan'],
            ['nama_role' => 'kelurahan'],
            ['nama_role' => 'admin Dinsos'],
            ['nama_role' => 'rt']
        ]);
    }
}
