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
                'email' => 'syaokifaradisa09@gmail.com',
                'password' => bcrypt('123'),
                'fasyankes_name' => "RS BJB",
                'city' => 'Banjarbaru',
                'province' => 'Kalimantan Selatan',
                'phone' => '082149411670',
                'fasyankes_class_id' => 1,
                'pic' => '',
                'pic_phone' => '',
                'fasyankes_category_id' => 1,
                'address' => 'Komp. Galuh Marindu Jln. Persada XII No. 47'
            ]
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
