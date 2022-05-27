<?php

namespace Database\Seeders;

use App\Models\InstrumentGroup;
use Illuminate\Database\Seeder;

class InstrumentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            [
                'id' => 1,
                'name' => 'Digital Tachometer'
            ],[
                'id' => 2,
                'name' => 'Stopwatch'
            ],[
                'id' => 3,
                'name' => 'Electrical Safety Analyzer',
            ],[
                'id' => 4,
                'name' => 'Thermohygrolight'
            ]
        ];

        foreach($groups as $group){
            InstrumentGroup::create($group);
        }
    }
}
