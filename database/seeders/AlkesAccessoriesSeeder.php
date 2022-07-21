<?php

namespace Database\Seeders;

use App\Models\AlkesAccessories;
use Illuminate\Database\Seeder;

class AlkesAccessoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AlkesAccessories::create([
            'accessories' => '-'
        ]);
    }
}
