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
            'number' => 'E - ' . 22 . '.' . ' DL',
            'letter_number' => 1234,
            'letter_date' => date('Y-m-d H:i:s'),
        ]);
    }
}
