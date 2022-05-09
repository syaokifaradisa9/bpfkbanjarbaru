<?php

namespace Database\Seeders;

use App\Models\AlkesOrderDescription;
use Illuminate\Database\Seeder;

class AlkesOrderDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AlkesOrderDescription::create([
            'description' => '',
        ]);
    }
}
