<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AlkesSeeder;
use Database\Seeders\AlkesCategorySeeder;

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
            AlkesCategorySeeder::class,
            AlkesSeeder::class,
            AdminUserSeeder::class,
        ]);
    }
}
