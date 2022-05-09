<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'syaokifaradisa9@gmail.com',
                'password' => bcrypt('123'),
                'fasyenkes_name' => "RS BJB",
                'hash' => "12345"
            ]
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
