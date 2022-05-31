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
            ['id' => 1, 'name'  => 'Vital Signs Simulator-BPM'],
            ['id' => 2, 'name'  => 'Digital Thermohygrometer-BPM'],
            ['id' => 3, 'name'  => 'Electrical Safety Analyzer-BPM'],

            ['id' => 4, 'name'  => 'Digital Tachometer-Centrifuge'],
            ['id' => 5, 'name'  => 'Stopwatch-Centrifuge'],
            ['id' => 6, 'name'  => 'Electrical Safety Analyzer-Centrifuge'],
            ['id' => 7, 'name'  => 'Thermohygrolight-Centrifuge'],

            ['id' => 8, 'name'  => 'Digital Tachometer-Dental Unit'],
            ['id' => 9, 'name'  => 'Electrical Safety Analyzer-Dental Unit'],
            ['id' => 10, 'name' => 'Digital Lux Meter-Dental Unit'],
            ['id' => 11, 'name' => 'Digital Pressure Meter-Dental Unit'],
            ['id' => 12, 'name' => 'Thermohygrolight-Dental Unit'],

            ['id' => 13, 'name' => 'Fetal Simulator-Fetal Doppler'],
            ['id' => 14, 'name' => 'Electrical Safety Analyzer-Fetal Doppler'],
            ['id' => 15, 'name' => 'Digital Thermohygrobarometer-Fetal Doppler'],
        ];

        foreach($groups as $group){
            InstrumentGroup::create($group);
        }
    }
}
