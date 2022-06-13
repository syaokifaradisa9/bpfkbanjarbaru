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
            ],[
                'name' => "Choirul Huda",
                'email' => "cakhuda06@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PENYELIA"
            ],[
                'name' => "Muhammad Syaoki Faradisa",
                'email' => 'syaokifaradisa@gmail.com',
                'password' => bcrypt('123'),
                'role' => 'BENDAHARA',
            ],[
                'name' => "Farid Wajidi, S.KM",
                'email' => "faridwajidi931@yahoo.com",
                'password' => bcrypt('1234567'),
                'role' => "PENYELIA"
            ],[
                'name' => "Rangga Setya Hantoko",
                'email' => "rangga_setyahantoko@yahoo.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Donny Martha",
                'email' => "mdonny87@live.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Hary Ernanto",
                'email' => "kangmas.hary@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Isra Mahensa",
                'email' => "isramahensa16@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Muhammad Arrizal Septiawan",
                'email' => "rizalkecell@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Muhammad Zaenuri Sugiasmoro",
                'email' => "zaenart82@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Hamdan Syarif",
                'email' => "hamdansyarif31@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Muhammad Irfan Husnuzhzhan",
                'email' => "irfan.atem16@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Fatimah Novrianisa",
                'email' => "fatimahnovrianisa@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Taufik Priawan",
                'email' => "priawantaufik7@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Wardimanul Abrar",
                'email' => "wardimanulabrar04@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Muhammad Iqbal Saiful Rahman",
                'email' => "iqblmuhmmdsr@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Venna Filosofia",
                'email' => "vennafilsof@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Septia Khairunnisa",
                'email' => "takankatia@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Achmad Fauzan Adzim",
                'email' => "a.fauzanadzim@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Gusti Arya Dinata",
                'email' => "gustiaryad@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Muhammad Alpian Hadi",
                'email' => "alpianhd@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Ryan Rama Chaesar R",
                'email' => "ryanramachaesar8@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Siti Fathul Jannah",
                'email' => "jannahfathulsiti@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Ahmad Ghazali",
                'email' => "ahmadghazali784@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Azhar Alamsyah",
                'email' => "azharalamsyah99@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],[
                'name' => "Sholihatussa'diah",
                'email' => "sholihatussadiah@gmail.com",
                'password' => bcrypt('1234567'),
                'role' => "PETUGAS"
            ],
        ];

        foreach($accounts as $account){
            AdminUser::create($account);
        }
    }
}
