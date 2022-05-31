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

        $group_ids = [2, 2, 3];
        $length = [8, 13, 9];
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
    }
}
