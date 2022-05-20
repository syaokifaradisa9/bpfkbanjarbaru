<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = [
            [
                'name' => "Muhammad Syaoki Faradisa",
                'email' => 'syaokifaradisa9@gmail.com',
                'password' => bcrypt('123'),
                'role' => 'YANTEK',
            ]
        ];

        foreach($accounts as $account){
            AdminUser::create($account);
        }
    }
}
