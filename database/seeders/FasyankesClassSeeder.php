<?php

namespace Database\Seeders;

use App\Models\FasyankesClass;
use Illuminate\Database\Seeder;

class FasyankesClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classNames = [
            'A',
            'B',
            'C',
            'D',
            'Khusus Bedah B',
            'Khusus Gigi & Mulut B',
            'Khusus Ibu & Anak C',
            'Khusus Mata C',
            'D Pratama',
        ];

        foreach($classNames as $className){
            FasyankesClass::create(['class_name' => $className]);
        }
    }
}
