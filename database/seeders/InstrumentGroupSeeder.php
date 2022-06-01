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
            
            ['id' => 16, 'name' => 'Multiparameter Simulator-ECG Recorder'],
            ['id' => 17, 'name' => 'Electrical Safety Analyzer-ECG Recorder'],
            ['id' => 18, 'name' => 'Digital Caliper-ECG Recorder'],
            ['id' => 19, 'name' => 'Thermohygrolight-ECG Recorder'],
            
            ['id' => 20, 'name' => 'Gas Flow Analyzer-Flowmeter'],
            ['id' => 21, 'name' => 'Thermohygrolight-Flowmeter'],
            
            ['id' => 22, 'name' => 'Electrical Safety Analyzer-Infusion Pump'],
            ['id' => 23, 'name' => 'Thermohygrolight-Infusion Pump'],

            ['id' => 24, 'name' => 'Thermocouple Data Logger-Lab Refrigerator'],
            ['id' => 25, 'name' => 'Temperature Recorder-Lab Refrigerator'],
            ['id' => 26, 'name' => 'Electrical Safety Analyzer-Lab Refrigerator'],
            ['id' => 27, 'name' => 'Thermohygrolight-Lab Refrigerator'],

            ['id' => 28, 'name' => 'Gas Flow Analyzer-Nebulizer'],
            ['id' => 29, 'name' => 'Electrical Safety Analyzer-Nebulizer'],
            ['id' => 30, 'name' => 'Thermohygrolight-Nebulizer'],
        ];

        foreach($groups as $group){
            InstrumentGroup::create($group);
        }
    }
}
