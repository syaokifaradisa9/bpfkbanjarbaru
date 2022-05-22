<?php

namespace Database\Seeders;

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
        $orders = [];

        // ECG Recorder
        array_push($orders, ['alkes_id' => 39,'external_order_id' => 1,'alkes_order_description_id' => 1]);

        for($i = 0; $i < 2; $i++){
            // O2 Concentrator
            array_push($orders, ['alkes_id' => 19,'external_order_id' => 1,'alkes_order_description_id' => 1]);
            // SPO2 Monitor
            array_push($orders, ['alkes_id' => 56,'external_order_id' => 1,'alkes_order_description_id' => 1]);
        }

        for($i = 0; $i < 3; $i++){
            // Alat Hisap Medik / Suction Pump
            array_push($orders, ['alkes_id' => 23,'external_order_id' => 1,'alkes_order_description_id' => 1]);
            // Autoclave
            array_push($orders, ['alkes_id' => 25,'external_order_id' => 1,'alkes_order_description_id' => 1]);
        }

        for($i = 0; $i < 4; $i++){
            // Centrifuge
            array_push($orders, ['alkes_id' => 32,'external_order_id' => 1,'alkes_order_description_id' => 1]);
            // Dental Unit
            array_push($orders, ['alkes_id' => 37,'external_order_id' => 1,'alkes_order_description_id' => 1]);
            // Nebulizer
            array_push($orders, ['alkes_id' => 18,'external_order_id' => 1,'alkes_order_description_id' => 1]);
        }

        // Doppler
        for($i = 0; $i < 6; $i++){
            array_push($orders, ['alkes_id' => 38,'external_order_id' => 1,'alkes_order_description_id' => 1]);
        }

        // Flowmeter
        for($i = 0; $i < 7; $i++){
            array_push($orders, ['alkes_id' => 1,'external_order_id' => 1,'alkes_order_description_id' => 1]);
        }

        // Blood Pressure Monitor
        for($i = 0; $i < 8; $i++){
            array_push($orders, [
                'alkes_id' => 59,
                'external_order_id' => 1,
                'alkes_order_description_id' => 1
            ]);
        }

        // Stelititator Kering
        for($i = 0; $i < 10; $i++){
            array_push($orders, ['alkes_id' => 62,'external_order_id' => 1,'alkes_order_description_id' => 1]);
        }

        // Stelititator Kering
        for($i = 0; $i < 11; $i++){
            array_push($orders, ['alkes_id' => 5,'external_order_id' => 1,'alkes_order_description_id' => 1]);
        }

        // Spygmomanometer
        for($i = 0; $i < 12; $i++){
            array_push($orders, ['alkes_id' => 58,'external_order_id' => 1,'alkes_order_description_id' => 1]);
        }

        // Laboratorium Refrigerator
        for($i = 0; $i < 14; $i++){
            array_push($orders, ['alkes_id' => 51,'external_order_id' => 1,'alkes_order_description_id' => 1]);
        }

        foreach($orders as $order){
            ExternalAlkesOrder::create($order);
        }
    }
}
