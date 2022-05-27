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
            // Centrifuge
            ['alkes_id' => 36, 'instrument_group_id' => 1],
            ['alkes_id' => 36, 'instrument_group_id' => 2],
            ['alkes_id' => 36, 'instrument_group_id' => 3],
            ['alkes_id' => 36, 'instrument_group_id' => 4],
        ];

        foreach($relations as $relation){
            InstrumentAlkesGroup::create($relation);
        }
    }
}
