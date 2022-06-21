<?php

namespace Database\Seeders;

use App\Models\FasyankesCategory;
use Illuminate\Database\Seeder;

class FasyankesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Rumah Sakit',
            'Puskesmas',
            'Klinik',
            'Industri'
        ];

        foreach($categories as $category){
            FasyankesCategory::create(['category_name' => $category]);
        }
    }
}
