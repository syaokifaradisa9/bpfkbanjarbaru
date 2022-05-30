<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AlkesSeeder;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\AlkesCategorySeeder;
use Database\Seeders\ExternalOrderSeeder;
use Database\Seeders\ExternalOfficerSeeder;
use Database\Seeders\InstrumentGroupSeeder;
use Database\Seeders\ExternalAlkesOrderSeeder;
use Database\Seeders\MeasuringInstrumentSeeder;
use Database\Seeders\InstrumentAlkesGroupSeeder;
use Database\Seeders\AlkesOrderDescriptionSeeder;
use Database\Seeders\InstrumentGroupRelationSeeder;

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
            AlkesOrderDescriptionSeeder::class,
            ExternalOrderSeeder::class,
            ExternalAlkesOrderSeeder::class,
            ExternalOfficerSeeder::class,
            MeasuringInstrumentSeeder::class,
            InstrumentGroupSeeder::class,
            InstrumentAlkesGroupSeeder::class,
            InstrumentGroupRelationSeeder::class,
        ]);
    }
}
