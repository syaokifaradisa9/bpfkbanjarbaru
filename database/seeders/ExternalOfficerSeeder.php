<?php

namespace Database\Seeders;

use App\Models\ExternalOfficerOrder;
use Illuminate\Database\Seeder;

class ExternalOfficerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExternalOfficerOrder::create([
            'admin_user_id' => 5,
            'external_order_id' => 1
        ]);
    }
}
