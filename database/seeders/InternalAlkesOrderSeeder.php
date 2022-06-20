<?php

namespace Database\Seeders;

use App\Models\Alkes;
use Illuminate\Database\Seeder;
use App\Models\InternalAlkesOrder;

class InternalAlkesOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listAlkes = Alkes::whereNotNull('excel_name')->get();
        foreach($listAlkes as $alkes){
            InternalAlkesOrder::create([
                'alkes_id' => $alkes->id,
                'internal_order_id' => 1
            ]);
        }
    }
}