<?php

namespace Database\Seeders;

use App\Models\Alkes;
use App\Models\ExternalAlkesOrder;
use Illuminate\Database\Seeder;

class ExternalAlkesOrderSeeder extends Seeder
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
            ExternalAlkesOrder::create([
                'alkes_id' => $alkes->id,
                'external_order_id' => 1,
                'alkes_order_description_id' => 1
            ]);
        }
    }
}
