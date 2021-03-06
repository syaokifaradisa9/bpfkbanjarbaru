<?php

namespace Database\Seeders;

use App\Models\InternalOrder;
use Illuminate\Database\Seeder;

class InternalOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InternalOrder::create([
            'id' => 1,
            'user_id' => 1,
            'letter_name' => 'test',
            'status' => 'ALAT DAN SERTIFIKAT TELAH DISERAHKAN',
            'number' => 'E - 001 DT',
            'delivery_date_estimation' => date('Y-m-d', strtotime('2022-06-01')),
            'delivery_option' => 'Diantar oleh pihak pertama',
            'arrival_date_estimation' => date('Y-m-d', strtotime('2022-06-20')),
            'contact_person_name' => "tes",
            'contact_person_phone' => '082149411670'
        ]);
    }
}
