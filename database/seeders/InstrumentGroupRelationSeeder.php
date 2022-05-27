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
        for($i = 1; $i <= 55; $i++){
            $group_id = 0;

            if($i >= 1 && $i <= 7){
                $group_id = 1;
            }else if($i >= 8 && $i <= 23){
                $group_id = 2;
            }else if($i >= 24 && $i <= 34){
                $group_id = 3;
            }else if($i >= 35 && $i <= 55){
                $group_id = 4;
            }

            InstrumentGroupRelation::create([
                'instrument_group_id' => $group_id, 
                'measure_instrument_id' => $i
            ]);
        }
    }
}
