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
        $orders = [
            [
                'alkes_id' => 1,
                'external_order_id' => 1,
                'alkes_order_description_id' => 1
            ],
            [
                'alkes_id' => 2,
                'external_order_id' => 1,
                'alkes_order_description_id' => 1
            ],
        ];

        foreach($orders as $order){
            ExternalAlkesOrder::create($order);
        }
    }
}
