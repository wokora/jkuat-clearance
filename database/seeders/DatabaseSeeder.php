<?php

namespace Database\Seeders;

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
        $this->call(ClearanceSectionStatusTableSeeder::class);
        $this->call(ClearanceStatusTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
