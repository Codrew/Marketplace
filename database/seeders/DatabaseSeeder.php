<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CityTableSeeder;
use Database\Seeders\StateTableSeeder;
use Database\Seeders\CountryTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([CountryTableSeeder::class,CityTableSeeder::class,StateTableSeeder::class]);
        // \App\Models\User::factory(10)->create();
    }
}
