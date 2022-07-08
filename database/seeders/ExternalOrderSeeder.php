<?php

namespace Database\Seeders;

use App\Models\ExternalOrder;
use Illuminate\Database\Seeder;

class ExternalOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExternalOrder::create([
            'user_id' => 1,
            'letter_name' => 'test.pdf',
            'number' => 'E - ' . 22 . '.' . '23 DL',
            'letter_number' => 1234,
            'letter_date' => date('Y-m-d H:i:s'),
            'status' => 'SELESAI',
            'pp_hour' => 24,
            'pp_minute' => 33,
            'total_officer' => 4,
            'accommodation' => 12000000,
            'accommodation_description' => '-',
            'daily_accommodation' => 500000,
            'daily_description' => 150000,
            'rapid_test_accommodation' => 150000,
            'rapid_test_description' => '-',
            'created_at' => time()
        ]);
    }
}
