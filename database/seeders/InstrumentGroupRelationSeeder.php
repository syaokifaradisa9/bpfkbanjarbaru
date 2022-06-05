<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InstrumentGroupRelation;

class InstrumentGroupRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* 
            group_ids = Id dari tabel Instrument Group
            start     = Batas awal id measuring instrument yang akan dimasukkan
            length    = Batas akhir id measuring instrument yang akan dimasukkan
            code      = Kode alat ukur yang ada di tabel measuring instrument
        */

        /* =============== Blood Pressure Monitor =============== */
        InstrumentGroupRelation::create(['instrument_group_id' => 1, 'measuring_instrument_id' => 'VSS1']);
        InstrumentGroupRelation::create(['instrument_group_id' => 1, 'measuring_instrument_id' => 'NIBP1']);
        InstrumentGroupRelation::create(['instrument_group_id' => 1, 'measuring_instrument_id' => 'NIBP2']);
        InstrumentGroupRelation::create(['instrument_group_id' => 1, 'measuring_instrument_id' => 'HNIBP1']);

        $group_ids = [2, 1, 3];
        $length = [8, 14, 9];
        foreach(['DTM', 'DTBM', 'ESA'] as $index => $code){
            for($i = 1; $i <= $length[$index]; $i++){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => $group_ids[$index], 
                    'measuring_instrument_id' => $code.$i
                ]);
            }
        }

        /* =============== Centrifuge =============== */
        $group_ids = [4, 5, 6, 7, 7];
        $length = [7, 16, 9, 11, 8];
        foreach(['DT', 'STOP', 'ESA', 'TL', 'TB'] as $index => $code){
            for($i = 1; $i <= $length[$index]; $i++){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => $group_ids[$index], 
                    'measuring_instrument_id' => $code.$i
                ]);
            }
        }
        
        /* =============== Dental Unit =============== */
        $group_ids = [8, 9, 10, 10, 11, 11, 12];
        $start     = [1, 1, 1,  1,  1,  1,  6];
        $length    = [7, 9, 7,  1,  11, 1,  23];
        foreach(['DT', 'ESA', 'DLUX', 'LUX', 'DPM', 'UB', 'TL'] as $index => $code){
            for($i = $start[$index]; $i <= $length[$index]; $i++){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => $group_ids[$index], 
                    'measuring_instrument_id' => $code.$i
                ]);
            }
        }

        // Fetal Doppler
        $group_ids = [13, 14, 15];
        $start     = [1,  1,  1];
        $length    = [7,  9,  11];
        foreach(['FS', 'ESA', 'TL'] as $index => $code){
            for($i = $start[$index]; $i <= $length[$index]; $i++){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => $group_ids[$index], 
                    'measuring_instrument_id' => $code.$i
                ]);
            }
        }

        for($i = 1; $i <= 8; $i++){
            if($i != 5){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => 15, 
                    'measuring_instrument_id' => 'TB'.$i
                ]);
            }
        }

        // ECG Recorder
        $group_ids = [16, 16, 17, 18, 19, 19];
        $start     = [1,  1,  1,  1,  6,  1];
        $length    = [7,  5,  9,  6,  16, 8];
        foreach(['MSIM', 'VSS', 'ESA', 'DCP', 'TL', 'TB'] as $index => $code){
            for($i = $start[$index]; $i <= $length[$index]; $i++){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => $group_ids[$index], 
                    'measuring_instrument_id' => $code.$i
                ]);
            }
        }

        // Flowmeter
        $group_ids = [20, 21];
        $start     = [1,  6];
        $length    = [11,  24];
        foreach(['GFA', 'TL'] as $index => $code){
            for($i = $start[$index]; $i <= $length[$index]; $i++){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => $group_ids[$index], 
                    'measuring_instrument_id' => $code.$i
                ]);
            }
        }

        // Infusion Pump
        $group_ids = [22, 23];
        $start     = [1,  6];
        $length    = [9,  24];
        foreach(['ESA', 'TL'] as $index => $code){
            for($i = $start[$index]; $i <= $length[$index]; $i++){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => $group_ids[$index], 
                    'measuring_instrument_id' => $code.$i
                ]);
            }
        }

        // Lab Refrigerator
        $group_ids = [24, 24, 24, 24, 25, 26, 27];
        $start     = [1,  1,  1,  1,  1,  1,  6];
        $length    = [2,  1,  3,  9,  5,  9,  24];
        foreach(['TDL', 'MC', 'RT', 'WTR', 'TREC', 'ESA', 'TL'] as $index => $code){
            for($i = $start[$index]; $i <= $length[$index]; $i++){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => $group_ids[$index], 
                    'measuring_instrument_id' => $code.$i
                ]);
            }
        }

        // Nebulizer
        $group_ids = [28, 29, 30];
        $start     = [1,  2,  6];
        $length    = [11, 9,  24];
        foreach(['GFA', 'ESA', 'TL'] as $index => $code){
            for($i = $start[$index]; $i <= $length[$index]; $i++){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => $group_ids[$index], 
                    'measuring_instrument_id' => $code.$i
                ]);
            }
        }

        // Patient Monitor
        $group_ids = [31, 31, 32, 32, 33, 33, 33, 34, 35];
        $start     = [1,  1,  1,  2,  1,  1,  1,  1,  6];
        $length    = [7,  5,  7,  3,  8,  1,  5,  9,  24];
        foreach(['MSIM', 'VSS', 'SPO', 'VSS', 'VSS', 'HNIBP', 'NIBP', 'ESA', 'TL'] as $index => $code){
            for($i = $start[$index]; $i <= $length[$index]; $i++){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => $group_ids[$index], 
                    'measuring_instrument_id' => $code.$i
                ]);
            }
        }

        // Pulse Oxymetri
        for($i = 1; $i <= 7; $i++){
            if($i != 2){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => 36, 
                    'measuring_instrument_id' => 'SPO'.$i
                ]);
            }
        }

        for($i = 7; $i <= 14; $i++){
            if($i != 13){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => 38, 
                    'measuring_instrument_id' => 'DTBM'.$i
                ]);
            }
        }

        $group_ids = [37, 38];
        $start     = [1,  6];
        $length    = [9,  11];
        foreach(['ESA', 'TL'] as $index => $code){
            for($i = $start[$index]; $i <= $length[$index]; $i++){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => $group_ids[$index], 
                    'measuring_instrument_id' => $code.$i
                ]);
            }
        }

        // Sphygmomanometer
        $group_ids = [39, 41];
        $start     = [12, 1];
        $length    = [17, 16];
        foreach(['DPM', 'STOP'] as $index => $code){
            for($i = $start[$index]; $i <= $length[$index]; $i++){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => $group_ids[$index], 
                    'measuring_instrument_id' => $code.$i
                ]);
            }
        }

        for($i = 4; $i <= 11; $i++){
            if($i != 8){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => 40, 
                    'measuring_instrument_id' => 'DTM'.$i
                ]);
            }
        }

        for($i = 1; $i <= 15; $i++){
            if($i != 5){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => 40, 
                    'measuring_instrument_id' => 'DTBM'.$i
                ]);
            }
        }

        // Suction Pump
        for($i = 1; $i <= 11; $i++){
            if($i != 3){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => 42, 
                    'measuring_instrument_id' => 'DPM'.$i
                ]);
            }
        }

        $group_ids = [42, 43];
        $start     = [1, 1];
        $length    = [1, 9];
        foreach(['UB', 'ESA'] as $index => $code){
            for($i = $start[$index]; $i <= $length[$index]; $i++){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => $group_ids[$index], 
                    'measuring_instrument_id' => $code.$i
                ]);
            }
        }

        for($i = 1; $i <= 14; $i++){
            if($i != 5 || $i != 6){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => 44, 
                    'measuring_instrument_id' => 'DTBM'.$i
                ]);
            }
        }

        // Syringe Pump
        $group_ids = [45, 46];
        $start     = [1, 6];
        $length    = [9, 24];
        foreach(['ESA', 'TL'] as $index => $code){
            for($i = $start[$index]; $i <= $length[$index]; $i++){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => $group_ids[$index], 
                    'measuring_instrument_id' => $code.$i
                ]);
            }
        }

        // Timbangan Bayi
        $group_ids = [47, 48];
        $start     = [1, 6];
        $length    = [7, 23];
        foreach(['ATS', 'TL'] as $index => $code){
            for($i = $start[$index]; $i <= $length[$index]; $i++){
                InstrumentGroupRelation::create([
                    'instrument_group_id' => $group_ids[$index], 
                    'measuring_instrument_id' => $code.$i
                ]);
            }
        }
    }
}
