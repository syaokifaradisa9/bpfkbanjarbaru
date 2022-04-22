<?php

namespace Database\Seeders;

use App\Models\Alkes;
use Illuminate\Database\Seeder;

class AlkesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alkes = [
            // Kalibrasi
            ['name' => 'Flowmeter (regulator oksigen)', 'price' => 192000, 'alkes_category_id' => 1],
            ['name' => 'Thermometer Klinik', 'price' => 216000, 'alkes_category_id' => 1],
            ['name' => 'Vaporizer (tanpa gas anaesthesi)', 'price' => 396000, 'alkes_category_id' => 1],
            ['name' => 'Vaporizer Dengan Gas Desilurane', 'price' => 2076000, 'alkes_category_id' => 1],
            ['name' => 'Vaporizer Dengan Gas Enflurane', 'price' => 2076000, 'alkes_category_id' => 1],
            ['name' => 'Vaporizer Dengan Gas Halothane', 'price' => 2076000, 'alkes_category_id' => 1],
            ['name' => 'Vaporizer Dengan Gas Isoflurane', 'price' => 2076000, 'alkes_category_id' => 1],
            ['name' => 'Vaporizer Dengan Gas Sevoflurane', 'price' => 2076000, 'alkes_category_id' => 1],
            ['name' => 'Timbangan Bayi', 'price' => 180000, 'alkes_category_id' => 1],
            ['name' => 'Timbangan Dewasa', 'price' => 168000, 'alkes_category_id' => 1],
            ['name' => 'Mikropipet Fix', 'price' => 288000, 'alkes_category_id' => 1],
            ['name' => 'Mikropipet Multi Channel', 'price' => 288000, 'alkes_category_id' => 1],
            ['name' => 'Mikropipet Variabel', 'price' => 384000, 'alkes_category_id' => 1],
            ['name' => 'Analytical Balance', 'price' => 180000, 'alkes_category_id' => 1],
            ['name' => 'Thermohygrometer Analog', 'price' => 672000, 'alkes_category_id' => 1],
            ['name' => 'Thermohygrometer Digital', 'price' => 732000, 'alkes_category_id' => 1],

            // Pengujian
            ['name' => 'TLD', 'price' => 150000, 'alkes_category_id' => 2],
            ['name' => 'Thermo Luminescence Harsaw', 'price' => 150000, 'alkes_category_id' => 2],
            ['name' => 'Head Lamp', 'price' => 144000, 'alkes_category_id' => 2],
            ['name' => 'Examination lamp (Lampu Tindakan)', 'price' => 144000, 'alkes_category_id' => 2],
            ['name' => 'Lampu Operasi', 'price' => 192000, 'alkes_category_id' => 2],
            ['name' => 'Nebulizer', 'price' => 228000, 'alkes_category_id' => 2],
            ['name' => 'O2 Concentrator', 'price' => 228000, 'alkes_category_id' => 2],
            ['name' => 'Photo Therapy Unit / Blue Light', 'price' => 204000, 'alkes_category_id' => 2],
            ['name' => 'UV Lamp', 'price' => 156000, 'alkes_category_id' => 2],
            ['name' => 'UV Sterilizer', 'price' => 180000, 'alkes_category_id' => 2],

            // Pengujian dan Kalibrasi
            ['name' => 'Alat Hisap Medik / Suction Pump', 'price' => 144000, 'alkes_category_id' => 3],
            ['name' => 'Suction Wall', 'price' => 96000, 'alkes_category_id' => 3],
            ['name' => 'Autoclave', 'price' => 321000, 'alkes_category_id' => 3],
            ['name' => 'Tradmill With ECG', 'price' => 250000, 'alkes_category_id' => 3],
            ['name' => 'Anasthesi Ventilator', 'price' => 396000, 'alkes_category_id' => 3],
            ['name' => 'Audiometer', 'price' => 396000, 'alkes_category_id' => 3],
            ['name' => 'Baby Incubator / Inkubator Perawatan', 'price' => 324000, 'alkes_category_id' => 3],
            ['name' => 'Bedside Monitor / Patient Monitor', 'price' => 588000, 'alkes_category_id' => 3],
            ['name' => 'Blood Bank', 'price' => 252000, 'alkes_category_id' => 3],
            ['name' => 'Centrifuge', 'price' => 240000, 'alkes_category_id' => 3],
            ['name' => 'CPAP', 'price' => 396000, 'alkes_category_id' => 3],
            ['name' => 'Defibrillator', 'price' => 156000, 'alkes_category_id' => 3],
            ['name' => 'Defibrillator With ECG', 'price' => 300000, 'alkes_category_id' => 3],
            ['name' => 'Defibrillator Monitor (AED)', 'price' => 300000, 'alkes_category_id' => 3],
            ['name' => 'Dental Unit', 'price' => 168000, 'alkes_category_id' => 3],
            ['name' => 'Deppler / Fetal Detector', 'price' => 156000, 'alkes_category_id' => 3],
            ['name' => 'ECG Recorder', 'price' => 180000, 'alkes_category_id' => 3],
            ['name' => 'Elektro Stimulator / EST', 'price' => 288000, 'alkes_category_id' => 3],
            ['name' => 'Cardiotocograph (CTC)', 'price' => 168000, 'alkes_category_id' => 3],
            ['name' => 'ESU', 'price' => 348000, 'alkes_category_id' => 3],
            ['name' => 'Haemodialisa', 'price' => 216000, 'alkes_category_id' => 3],
            ['name' => 'Bedside With Defibilator', 'price' => 620000, 'alkes_category_id' => 3],
            ['name' => 'Blood Solution Warmer', 'price' => 216000, 'alkes_category_id' => 3],
            ['name' => 'Defiblitator With ECG With SPO2', 'price' => 400000, 'alkes_category_id' => 3],
            ['name' => 'Heart Rate Monitor', 'price' => 300000, 'alkes_category_id' => 3],
            ['name' => 'Infant Warmer', 'price' => 240000, 'alkes_category_id' => 3],
            ['name' => 'Infusion Pump', 'price' => 288000, 'alkes_category_id' => 3],
            ['name' => 'Laboratorium Incubator', 'price' => 252000, 'alkes_category_id' => 3],
            ['name' => 'Laboratorium Refrigerator', 'price' => 252000, 'alkes_category_id' => 3],
            ['name' => 'Laboratorium Rotator', 'price' => 144000, 'alkes_category_id' => 3],
            ['name' => 'Mesin Anaesthesi tanpa Vaporizer tanpa Ventilator', 'price' => 228000, 'alkes_category_id' => 3],
            ['name' => 'Oven', 'price' => 396000, 'alkes_category_id' => 3],
            ['name' => 'Paraffin Bath', 'price' => 252000, 'alkes_category_id' => 3],
            ['name' => 'Pulse Oximetri/ SPO2 Monitor', 'price' => 180000, 'alkes_category_id' => 3],
            ['name' => 'Short Wave Diathermi', 'price' => 312000, 'alkes_category_id' => 3],
            ['name' => 'Sphygmomanometer', 'price' => 84000, 'alkes_category_id' => 3],
            ['name' => 'Tensimeter Digital / Blood Pressure Monitor (BPM)', 'price' => 162000, 'alkes_category_id' => 3],
            ['name' => 'Spirometer', 'price' => 156000, 'alkes_category_id' => 3],
            ['name' => 'Sterilisator Basah', 'price' => 204000, 'alkes_category_id' => 3],
            ['name' => 'Sterilisator Kering', 'price' => 204000, 'alkes_category_id' => 3],
            ['name' => 'Syringe Pump', 'price' => 288000, 'alkes_category_id' => 3],
            ['name' => 'Traksi', 'price' => 168000, 'alkes_category_id' => 3],
            ['name' => 'Treadmill', 'price' => 168000, 'alkes_category_id' => 3],
            ['name' => 'Ultrasound therapy', 'price' => 216000, 'alkes_category_id' => 3],
            ['name' => 'USG', 'price' => 300000, 'alkes_category_id' => 3],
            ['name' => 'Vacuum Extractor', 'price' => 168000, 'alkes_category_id' => 3],
            ['name' => 'Ventilator', 'price' => 396000, 'alkes_category_id' => 3],
            ['name' => 'Water Bath', 'price' => 216000, 'alkes_category_id' => 3],
            ['name' => 'Centrifuge Refrigerator', 'price' => 420000, 'alkes_category_id' => 3],
            ['name' => 'Stirer', 'price' => 156000, 'alkes_category_id' => 3],
            ['name' => 'EEG', 'price' => 420000, 'alkes_category_id' => 3],
            ['name' => 'Blood Warmer', 'price' => 216000, 'alkes_category_id' => 3],
            ['name' => 'Medical Freezer', 'price' => 396000, 'alkes_category_id' => 3],
            ['name' => 'Thoracic Aspirator', 'price' => 144000, 'alkes_category_id' => 3],
            ['name' => 'Tracheal Aspirator', 'price' => 144000, 'alkes_category_id' => 3],
            ['name' => 'Suction Pump Saliva', 'price' => 144000, 'alkes_category_id' => 3],
            ['name' => 'Ventilator Transport', 'price' => 396000, 'alkes_category_id' => 3],
            ['name' => 'High Flow Nasal Cannula', 'price' => 396000, 'alkes_category_id' => 3],
            
            // Pengukuran Paparan Radiasi & Proteksi Radiasi
            ['name' => 'General Purpose', 'price' => 1032000, 'alkes_category_id' => 4],
            ['name' => 'General Purpose With Automatic Exposure Computed', 'price' => 1440000, 'alkes_category_id' => 4],
            ['name' => 'Mobile X Ray', 'price' => 876000, 'alkes_category_id' => 4],
            ['name' => 'Dental X Ray', 'price' => 950000, 'alkes_category_id' => 4],
            ['name' => 'Dental Panoramic', 'price' => 600000, 'alkes_category_id' => 4],
            ['name' => 'Dental Panoramic With Chepalometric', 'price' => 700000, 'alkes_category_id' => 4],
            ['name' => 'CT Scan', 'price' => 1044000, 'alkes_category_id' => 4],
            ['name' => 'Angiography', 'price' => 1000000, 'alkes_category_id' => 4],
            ['name' => 'Mobile C-Arm X-Ray', 'price' => 1008000, 'alkes_category_id' => 4],
            ['name' => 'X-Ray Fluoroscopy (Dual Fungsi R/F)', 'price' => 1116000, 'alkes_category_id' => 4],
            
            // Paparan Proteksi Radiasi
            ['name' => 'General Purpose', 'price' => 750000, 'alkes_category_id' => 5],
            ['name' => 'General Purpose With Automatic Exposure Computed', 'price' => 750000, 'alkes_category_id' => 5],
            ['name' => 'Mobile X Ray', 'price' => 600000, 'alkes_category_id' => 5],
            ['name' => 'Dental X Ray', 'price' => 500000, 'alkes_category_id' => 5],
            ['name' => 'Dental Panoramic', 'price' => 800000, 'alkes_category_id' => 5],
            ['name' => 'Dental Panoramic With Chepalometric', 'price' => 800000, 'alkes_category_id' => 5],
            ['name' => 'CT Scan', 'price' => 1150000, 'alkes_category_id' => 5],
            ['name' => 'Angiography', 'price' => 900000, 'alkes_category_id' => 5],
            ['name' => 'Mobile C-Arm X-Ray', 'price' => 1000000, 'alkes_category_id' => 5],
            ['name' => 'X-Ray Fluoroscopy (Dual Fungsi R/F)', 'price' => 1050000, 'alkes_category_id' => 5],

            // Pelayanan Uji Kesesuaian
            ['name' => 'General Purpose', 'price' => 1872000, 'alkes_category_id' => 6],
            ['name' => 'Mobile X Ray', 'price' => 1400000, 'alkes_category_id' => 6],
            ['name' => 'Dental X Ray', 'price' => 1400000, 'alkes_category_id' => 6],
            ['name' => 'Dental Panoramic', 'price' => 1400000, 'alkes_category_id' => 6],
            ['name' => 'CT Scan', 'price' => 2634000, 'alkes_category_id' => 6],

            // Pelayanan Inspeksi
            ['name' => 'Instalasi Listrik Medis', 'price' => 1100000, 'alkes_category_id' => 7],
            ['name' => 'Instalasi Tata Udara (HVAC)', 'price' => 1350000, 'alkes_category_id' => 7],
            ['name' => 'Grounding / Pentanahan', 'price' => 348000, 'alkes_category_id' => 7],
        ];

        foreach($alkes as $data){
            Alkes::insert($data);
        }
    }
}
