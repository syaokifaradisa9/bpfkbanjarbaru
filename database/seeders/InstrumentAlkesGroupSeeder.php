<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InstrumentAlkesGroup;

class InstrumentAlkesGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relations = [
            // BPM
            ['alkes_id' => 63, 'instrument_group_id' => 1],
            ['alkes_id' => 63, 'instrument_group_id' => 2],
            ['alkes_id' => 63, 'instrument_group_id' => 3],
            
            // Centrifuge
            ['alkes_id' => 36, 'instrument_group_id' => 4],
            ['alkes_id' => 36, 'instrument_group_id' => 5],
            ['alkes_id' => 36, 'instrument_group_id' => 6],
            ['alkes_id' => 36, 'instrument_group_id' => 7],

            // Dental Unit
            ['alkes_id' => 36, 'instrument_group_id' => 8],
            ['alkes_id' => 36, 'instrument_group_id' => 9],
            ['alkes_id' => 36, 'instrument_group_id' => 10],
            ['alkes_id' => 36, 'instrument_group_id' => 11],
            ['alkes_id' => 36, 'instrument_group_id' => 12],
        ];

        foreach($relations as $relation){
            InstrumentAlkesGroup::create($relation);
        }
    }
}
