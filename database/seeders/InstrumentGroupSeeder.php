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

            ['id' => 31, 'name' => 'Pengukuran ECG-Patient Monitor'],
            ['id' => 32, 'name' => 'Pengukuran Pulse Oximetri-Patient Monitor'],
            ['id' => 33, 'name' => 'Pengukuran NIBP-Patient Monitor'],
            ['id' => 34, 'name' => 'Pengukuran Keselamatan Kelistrikan-Patient Monitor'],
            ['id' => 35, 'name' => 'Pengukuran Suhu & Kelembaban-Patient Monitor'],

            ['id' => 36, 'name' => 'SPO2 Simulator-Pulse Oxymetry'],
            ['id' => 37, 'name' => 'Electrical Safety Analyzer-Pulse Oxymetry'],
            ['id' => 38, 'name' => 'Thermohygrolight-Pulse Oxymetry'],

            ['id' => 39, 'name' => 'Digital Pressure Meter-Sphygmomanometer'],
            ['id' => 40, 'name' => 'Digital Thermohygrometer-Sphygmomanometer'],
            ['id' => 41, 'name' => 'Stopwatch-Sphygmomanometer'],

            ['id' => 42, 'name' => 'Digital Pressure Meter-Suction Pump'],
            ['id' => 43, 'name' => 'Electrical Safety Analyzer-Suction Pump'],
            ['id' => 44, 'name' => 'Digital Thermohygrobarometer-Suction Pump'],

            ['id' => 45, 'name' => 'Electrical Safety Analyzer-Syringe Pump'],
            ['id' => 46, 'name' => 'Thermohygrolight-Syringe Pump'],

            ['id' => 47, 'name' => 'Anak Timbangan Standar-Timbangan Bayi'],
            ['id' => 48, 'name' => 'Thermohygrolight-Timbangan Bayi'],
        ];

        foreach($groups as $group){
            InstrumentGroup::create($group);
        }
    }
}
