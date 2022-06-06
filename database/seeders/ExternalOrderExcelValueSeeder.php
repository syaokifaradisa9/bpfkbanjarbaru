<?php

namespace Database\Seeders;

use App\Models\ExternalOrderExcelValue;
use Illuminate\Database\Seeder;

class ExternalOrderExcelValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flowmeter_order_id = 1;
        $flowmeter_worksheet = [
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'I2', 'value' => '1 / III - 22 / E - 0.0 DL'],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E5', 'value' => 'Avico'],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E6', 'value' => '-'],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E7', 'value' => '-'],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E8', 'value' => '1'],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E9', 'value' => '2022-03-01'],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E10', 'value' => '2022-03-01'],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E11', 'value' => 'Laboratorium Kalibrasi LPFK Banjarbaru'],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E12', 'value' => 'IGD'],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E17', 'value' => 22.4],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'F17', 'value' => 22.7],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E18', 'value' => 67.4],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'F18', 'value' => 67.8],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E21', 'value' => 'Baik'],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E22', 'value' => 'Baik'],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E27', 'value' => 1000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'F27', 'value' => 1000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'G27', 'value' => 1000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'H27', 'value' => 1000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'I27', 'value' => 1000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E28', 'value' => 2000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'F28', 'value' => 2000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'G28', 'value' => 2000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'H28', 'value' => 2000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'I28', 'value' => 2000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E29', 'value' => 3000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'F29', 'value' => 3000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'G29', 'value' => 3000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'H29', 'value' => 3000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'I29', 'value' => 3000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E30', 'value' => 4000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'F30', 'value' => 4000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'G30', 'value' => 4000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'H30', 'value' => 4000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'I30', 'value' => 4000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E31', 'value' => 5000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'F31', 'value' => 5000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'G31', 'value' => 5000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'H31', 'value' => 5000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'I31', 'value' => 5000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E32', 'value' => 6000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'F32', 'value' => 6000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'G32', 'value' => 6000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'H32', 'value' => 6000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'I32', 'value' => 6000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'E33', 'value' => 7000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'F33', 'value' => 7000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'G33', 'value' => 7000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'H33', 'value' => 7000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'I33', 'value' => 7000],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'B38', 'value' => 'Pembacaan skala dibawah bola'],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'B41', 'value' => 'Gas Flow Analyzer, Merek : Fluke, Model : VT900A, SN : 5101752-5102038'],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'B42', 'value' => 'Thermohygrolight, Merek : KIMO, Model : KH-210-AO, SN : 15062873'],
            ['external_alkes_order_id' => $flowmeter_order_id, 'cell' => 'B49', 'value' => 'Muhammad Irfan Husnuzhzhan']
        ];

        $worksheets = [
            ...$flowmeter_worksheet
        ];

        foreach($worksheets as $worksheet){
            ExternalOrderExcelValue::create($worksheet);
        }
    }
}
