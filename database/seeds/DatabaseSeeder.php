<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            jenKegSeeder::class,
            KotaSeeder::class,
            KecamatanSeeder::class,
            kelurahanSeeder::class,
            RtTableSeeder::class,
            UserSeeder::class
        ]);
    }
}
