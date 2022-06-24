<?php

namespace Database\Seeders;

use App\Models\InternalOfficerOrder;
use Illuminate\Database\Seeder;

class InternalOfficerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InternalOfficerOrder::create([
            'admin_user_id' => 5,
            'internal_order_id' => 1
        ]);
    }
}
