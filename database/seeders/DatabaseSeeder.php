<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AlkesSeeder;
use Database\Seeders\AlkesCategorySeeder;
use Database\Seeders\AlkesOrderDescriptionSeeder;

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
            UserSeeder::class,
            AlkesCategorySeeder::class,
            AlkesSeeder::class,
            AdminUserSeeder::class,
            AlkesOrderDescriptionSeeder::class
        ]);
    }
}
