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
            ['alkes_id' => 41, 'instrument_group_id' => 8],
            ['alkes_id' => 41, 'instrument_group_id' => 9],
            ['alkes_id' => 41, 'instrument_group_id' => 10],
            ['alkes_id' => 41, 'instrument_group_id' => 11],
            ['alkes_id' => 41, 'instrument_group_id' => 12],
            
            // Fetal Doppler
            ['alkes_id' => 42, 'instrument_group_id' => 13],
            ['alkes_id' => 42, 'instrument_group_id' => 14],
            ['alkes_id' => 42, 'instrument_group_id' => 15],

            // ECG Recorder
            ['alkes_id' => 43, 'instrument_group_id' => 16],
            ['alkes_id' => 43, 'instrument_group_id' => 17],
            ['alkes_id' => 43, 'instrument_group_id' => 18],
            ['alkes_id' => 43, 'instrument_group_id' => 19],

            // Flowmeter
            ['alkes_id' => 1, 'instrument_group_id' => 20],
            ['alkes_id' => 1, 'instrument_group_id' => 21],

            // Infusion Pump
            ['alkes_id' => 53, 'instrument_group_id' => 22],
            ['alkes_id' => 53, 'instrument_group_id' => 23],

            // Lab Refrigerator
            ['alkes_id' => 55, 'instrument_group_id' => 24],
            ['alkes_id' => 55, 'instrument_group_id' => 25],
            ['alkes_id' => 55, 'instrument_group_id' => 26],
            ['alkes_id' => 55, 'instrument_group_id' => 27],

            // Nebulizer
            ['alkes_id' => 22, 'instrument_group_id' => 28],
            ['alkes_id' => 22, 'instrument_group_id' => 29],
            ['alkes_id' => 22, 'instrument_group_id' => 30],

            // Patient Monitor
            ['alkes_id' =>34, 'instrument_group_id' => 31],
            ['alkes_id' =>34, 'instrument_group_id' => 32],
            ['alkes_id' =>34, 'instrument_group_id' => 33],
            ['alkes_id' =>34, 'instrument_group_id' => 34],
            ['alkes_id' =>34, 'instrument_group_id' => 35],

            // Pulse Oxymetri
            ['alkes_id' =>60, 'instrument_group_id' => 36],
            ['alkes_id' =>60, 'instrument_group_id' => 37],
            ['alkes_id' =>60, 'instrument_group_id' => 38],

            // Sphygmomanometer
            ['alkes_id' =>62, 'instrument_group_id' => 39],
            ['alkes_id' =>62, 'instrument_group_id' => 40],
            ['alkes_id' =>62, 'instrument_group_id' => 41],

            // Suction Pump
            ['alkes_id' =>27, 'instrument_group_id' => 42],
            ['alkes_id' =>27, 'instrument_group_id' => 43],
            ['alkes_id' =>27, 'instrument_group_id' => 44],

            // Syringe Pump
            ['alkes_id' =>67, 'instrument_group_id' => 45],
            ['alkes_id' =>67, 'instrument_group_id' => 46],

            // Timbangan Bayi
            ['alkes_id' =>9, 'instrument_group_id' => 47],
            ['alkes_id' =>9, 'instrument_group_id' => 48],
        ];

        foreach($relations as $relation){
            InstrumentAlkesGroup::create($relation);
        }
    }
}
