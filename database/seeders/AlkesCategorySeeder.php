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
            ['name' => 'Kalibrasi'],
            ['name' => 'Pengujian'],
            ['name' => 'Pengujian dan Kalibrasi'],
            ['name' => 'Pengukuran Paparan Radiasi & Proteksi Radiasi'],
            ['name' => 'Paparan Proteksi Radiasi'],
            ['name' => 'Pelayanan Uji Kesesuaian'],
            ['name' => 'Pelayanan Inspeksi']
        ];

        foreach($categories as $category){
            AlkesCategory::insert($category);
        }
    }
}
