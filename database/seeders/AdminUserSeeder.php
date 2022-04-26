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
                'email' => 'syaokifaradisa09@gmail.com',
                'password' => bcrypt('1234567'),
                'role' => 'DEVELOPER',
            ]
        ];

        foreach($accounts as $account){
            AdminUser::create($account);
        }
    }
}
