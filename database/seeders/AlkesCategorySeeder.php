<?php

namespace Database\Seeders;

use App\Models\AlkesCategory;
use Illuminate\Database\Seeder;

class AlkesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Kalibrasi', 'lab' => 'PK'],
            ['name' => 'Pengujian', 'lab' => 'PK'],
            ['name' => 'Pengujian dan Kalibrasi', 'lab' => 'PK'],
            ['name' => 'Pengukuran Paparan Radiasi & Proteksi Radiasi', 'lab' => 'PDP'],
            ['name' => 'Paparan Proteksi Radiasi', 'lab' => 'PDP'],
            ['name' => 'Pelayanan Uji Kesesuaian', 'lab' => 'UK'],
            ['name' => 'Pelayanan Inspeksi', 'lab' => 'SARPRAS']
        ];

        foreach($categories as $category){
            AlkesCategory::insert($category);
        }
    }
}
