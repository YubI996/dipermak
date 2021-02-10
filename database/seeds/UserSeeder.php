<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'Yubi',
            'email' => 'yubi@yubi.com',
            'password' => Hash::make('yubiyubi'),
            'role_id' => 1,
            'rt_id' => 75,
        ]);
    }
}
