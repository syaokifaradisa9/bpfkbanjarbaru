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
            [
                'name' => 'Flowmeter (regulator oksigen)', 
                'price' => 192000, 
                'alkes_category_id' => 1,
                'minute_estimation' => 40,
                'excel_name' => 'Flowmeter',
                'image_name' => 'Flowmeter',
            ],
            [
                'name' => 'Thermometer Klinik', 
                'price' => 216000, 
                'alkes_category_id' => 1,
                'minute_estimation' => 90,
                'image_name' => 'thermometer_klinik',
            ],
            [
                'name' => 'Vaporizer (tanpa gas anaesthesi)', 
                'price' => 396000, 
                'alkes_category_id' => 1,
                'minute_estimation' => 33,
                'image_name' => 'vaporizer_tanpa_gas_anaesthesi',
            ],
            [
                'name' => 'Vaporizer Dengan Gas', 
                'price' => 2076000, 
                'alkes_category_id' => 1,
                'minute_estimation' => 33,
                'image_name' => 'vaporizer_dengan_gas',
            ],
            ['name' => 'Vaporizer Dengan Gas Enflurane', 'price' => 2076000, 'alkes_category_id' => 1],
            ['name' => 'Vaporizer Dengan Gas Halothane', 'price' => 2076000, 'alkes_category_id' => 1],
            ['name' => 'Vaporizer Dengan Gas Isoflurane', 'price' => 2076000, 'alkes_category_id' => 1],
            ['name' => 'Vaporizer Dengan Gas Sevoflurane', 'price' => 2076000,'alkes_category_id' => 1],
            [
                'name' => 'Timbangan Bayi', 
                'price' => 180000, 
                'alkes_category_id' => 1,
                'minute_estimation' => 60,
                'excel_name' => 'Timbangan_Bayi',
                'image_name' => 'timbangan_bayi'
            ],[
                'name' => 'Timbangan Dewasa', 
                'price' => 168000, 
                'alkes_category_id' => 1
            ],[
                'name' => 'Mikropipet Fix', 
                'price' => 288000, 
                'alkes_category_id' => 1,
                'image_name' => 'mikropipet_fix'
            ],
            [
                'name' => 'Mikropipet Multi Channel', 
                'price' => 288000, 
                'alkes_category_id' => 1,
                'image_name' => 'mikropipet_multi_channel'
            ],
            [
                'name' => 'Mikropipet Variabel', 
                'price' => 384000, 
                'alkes_category_id' => 1,
                'image_name' => 'mikropipet_variable'
            ],
            [
                'name' => 'Analytical Balance', 
                'price' => 180000, 
                'alkes_category_id' => 1,
                'minute_estimation' => 55,
                'image_name' => 'analytical_balance'
            ],
            ['name' => 'Thermohygrometer Analog', 'price' => 672000, 'alkes_category_id' => 1],
            ['name' => 'Thermohygrometer Digital', 'price' => 732000, 'alkes_category_id' => 1],

            // Pengujian
            ['name' => 'TLD', 'price' => 150000, 'alkes_category_id' => 2],
            ['name' => 'Thermo Luminescence Harsaw', 'price' => 150000, 'alkes_category_id' => 2],
            [
                'name' => 'Head Lamp', 
                'price' => 144000, 
                'alkes_category_id' => 2,
                'minute_estimation' => 60,
                'image_name' => 'head_lamp'
            ],
            [
                'name' => 'Examination lamp (Lampu Tindakan)', 
                'price' => 144000, 
                'alkes_category_id' => 2,
                'minute_estimation' => 60,
                'image_name' => 'examination_lamp'
            ],
            [
                'name' => 'Lampu Operasi', 
                'price' => 192000, 
                'alkes_category_id' => 2,
                'minute_estimation' => 60,
            ],
            [
                'name' => 'Nebulizer', 
                'price' => 228000, 
                'alkes_category_id' => 2,
                'minute_estimation' => 45,
                'excel_name' => 'Nebulizer',
                'image_name' => 'nebulizer'
            ],
            [
                'name' => 'O2 Concentrator', 
                'price' => 228000, 
                'alkes_category_id' => 2,
                'minute_estimation' => 40,
                'image_name' => 'oxygen_concentrator'
            ],
            [
                'name' => 'Photo Therapy Unit / Blue Light', 
                'price' => 204000, 
                'alkes_category_id' => 2,
                'minute_estimation' => 50,
                'image_name' => 'phototheraphy'
            ],
            [
                'name' => 'UV Lamp', 
                'price' => 156000, 
                'alkes_category_id' => 2,
                'minute_estimation' => 50,
                'image_name' => 'uv_lamp'
            ],
            [
                'name' => 'UV Sterilizer', 
                'price' => 180000, 
                'alkes_category_id' => 2,
                'minute_estimation' => 50,
                'image_name' => 'uv_sterilizer'
            ],

            // Pengujian dan Kalibrasi
            [
                'name' => 'Alat Hisap Medik / Suction Pump', 
                'price' => 144000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 55,
                'excel_name' => 'Suction_Pump',
                'image_name' => 'suction_pump'
            ],
            [
                'name' => 'Suction Wall', 
                'price' => 96000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 60,
                'image_name' => 'wall_suction'
            ],
            [
                'name' => 'Autoclave', 
                'price' => 321000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 95,
                'image_name' => 'autoclave'
            ],
            [
                'name' => 'Tredmill With ECG', 
                'price' => 250000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 65,
                'image_name' => 'treadmill_with_ecg'
            ],
            [
                'name' => 'Anasthesi Ventilator', 
                'price' => 396000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 90,
                'image_name' => 'anesthesi_ventilator'
            ],
            [
                'name' => 'Audiometer', 
                'price' => 396000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 75,
                'image_name' => 'audiometer'
            ],
            [
                'name' => 'Baby Incubator / Inkubator Perawatan', 
                'price' => 324000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 180,
                'image_name' => 'baby_incubator'
            ],
            [
                'name' => 'Bedside Monitor / Patient Monitor', 
                'price' => 588000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 75,
                'excel_name' => 'Patient_Monitor',
                'image_name' => 'patient_monitor'
            ],
            [
                'name' => 'Blood Bank', 
                'price' => 252000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 90,
                'image_name' => 'blood_bank'
            ],
            [
                'name' => 'Centrifuge', 
                'price' => 240000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 75,
                'excel_name' => 'Centrifuge',
                'image_name' => 'centrifuge'
            ],
            [
                'name' => 'CPAP', 
                'price' => 396000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 60,
                'image_name' => 'cpap'
            ],
            [
                'name' => 'Defibrillator', 
                'price' => 156000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 75,
                'image_name' => 'defibrilator'
            ],
            [
                'name' => 'Defibrillator With ECG', 
                'price' => 300000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 100,
                'image_name' => 'defibrilator_with_ecg'
            ],
            [
                'name' => 'Defibrillator Monitor (AED)', 
                'price' => 300000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 64,
                'image_name' => 'defibrilator_monitor'
            ],
            [
                'name' => 'Dental Unit', 
                'price' => 168000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 90,
                'excel_name' => 'Dental_unit',
                'image_name' => 'dental_unit'
            ],
            [
                'name' => 'Doppler / Fetal Detector', 
                'price' => 156000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 45,
                'excel_name' => 'Doppler',
                'image_name' => 'doppler'
            ],
            [
                'name' => 'ECG Recorder', 
                'price' => 180000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 82,
                'excel_name' => 'ECG_Recorder',
                'image_name' => 'ecg_recorder'
            ],
            [
                'name' => 'Elektro Stimulator / EST', 
                'price' => 288000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 90,
                'image_name' => 'elektrostimulator'
            ],
            [
                'name' => 'Cardiotocograph (CTC)', 
                'price' => 168000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 50,
                'image_name' => 'cardiotocograph'
            ],
            [
                'name' => 'ESU', 
                'price' => 348000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 90,
                'image_name' => 'electrosurgical_unit'
            ],
            [
                'name' => 'Haemodialisa', 
                'price' => 216000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 90,
                'image_name' => 'haemodialisa'
            ],
            [
                'name' => 'Bedside With Defibilator', 
                'price' => 620000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 150,
                'image_name' => 'bedside_with_defibrillator'
            ],
            [
                'name' => 'Blood Solution Warmer', 
                'price' => 216000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 90,
                'image_name' => 'blood_warmer'
            ],
            [
                'name' => 'Defiblitator With ECG With SPO2', 
                'price' => 400000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 120,
                'image_name' => 'defibrilator_with_ecg_with_spo2'
            ],
            [
                'name' => 'Heart Rate Monitor', 
                'price' => 300000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 82,
                'image_name' => 'heart_rate_monitor'
            ],
            [
                'name' => 'Infant Warmer', 
                'price' => 240000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 75,
                'image_name' => 'infant_warmer'
            ],
            [
                'name' => 'Infusion Pump', 
                'price' => 288000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 75,
                'excel_name' => 'Infusion_Pump',
                'image_name' => 'infusion_pump'
            ],
            [
                'name' => 'Laboratorium Incubator', 
                'price' => 252000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 70,
                'image_name' => 'laboratorium_incubator'
            ],
            [
                'name' => 'Laboratorium Refrigerator', 
                'price' => 252000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 120,
                'excel_name' => 'LAB_Refrigerator',
                'image_name' => 'laboratorium_refrigerator'
            ],
            [
                'name' => 'Laboratorium Rotator', 
                'price' => 144000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 50,
                'image_name' => 'laboratorium_rotator'
            ],
            [
                'name' => 'Mesin Anaesthesi tanpa Vaporizer tanpa Ventilator', 
                'price' => 228000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 60,
                'image_name' => 'anesthesi_tanpa_vaporizer_tanpa_ventilator'
            ],
            [
                'name' => 'Oven', 
                'price' => 396000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 75,
                'image_name' => 'oven'
            ],
            [
                'name' => 'Paraffin Bath', 
                'price' => 252000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 120,
                'image_name' => 'parafin_bath'
            ],
            [
                'name' => 'Pulse Oximetri/ SPO2 Monitor', 
                'price' => 180000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 40,
                'excel_name' => 'Pulse_Oxymetry',
                'image_name' => 'pulse_oximetri'
            ],
            [
                'name' => 'Short Wave Diathermi', 
                'price' => 312000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 180,
                'image_name' => 'short_wave_diathermi'
            ],
            [
                'name' => 'Sphygmomanometer', 
                'price' => 84000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 55,
                'excel_name' => 'Sphygmomanometer',
                'image_name' => 'sphygmomanometer'
            ],
            [
                'name' => 'Tensimeter Digital / Blood Pressure Monitor (BPM)', 
                'price' => 162000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 50,
                'excel_name' => 'BPM',
                'image_name' => 'blood_pressure_monitor'
            ],
            [
                'name' => 'Spirometer', 
                'price' => 156000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 65,
                'image_name' => 'spirometer'
            ],
            [
                'name' => 'Sterilisator Basah', 
                'price' => 204000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 75,
                'image_name' => 'sterilisator_basah'
            ],
            [
                'name' => 'Sterilisator Kering', 
                'price' => 204000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 75,
                'image_name' => 'sterilisator_kering'
            ],
            [
                'name' => 'Syringe Pump', 
                'price' => 288000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 75,
                'excel_name' => 'Syringe_Pump',
                'image_name' => 'syringe_pump'
            ],
            [
                'name' => 'Traksi', 
                'price' => 168000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 70,
            ],
            [
                'name' => 'Treadmill', 
                'price' => 168000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 65,
                'image_name' => 'treadmill'
            ],
            [
                'name' => 'Ultrasound therapy', 
                'price' => 216000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 64,
                'image_name' => 'ultrasonograph'
            ],
            [
                'name' => 'USG', 
                'price' => 300000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 90,
            ],
            [
                'name' => 'Vacuum Extractor', 
                'price' => 168000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 60,
                'image_name' => 'vacuum_extractor'
            ],
            [
                'name' => 'Ventilator', 
                'price' => 396000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 60,
                'image_name' => 'ventilator'
            ],
            [
                'name' => 'Water Bath', 
                'price' => 216000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 63,
                'image_name' => 'water_bath'
            ],
            [
                'name' => 'Centrifuge Refrigerator', 
                'price' => 420000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 120,
                'image_name' => 'centrifuge_refrigerator'
            ],
            [
                'name' => 'Stirer', 
                'price' => 156000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 40,
                'image_name' => 'stirer'
            ],
            [
                'name' => 'EEG', 
                'price' => 420000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 90,
                'image_name' => 'eeg'
            ],
            [
                'name' => 'Blood Warmer', 
                'price' => 216000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 90,
                'image_name' => 'blood_warmer'
            ],
            [
                'name' => 'Medical Freezer', 
                'price' => 396000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 90,
                'image_name' => 'medical_freezer'
            ],
            [
                'name' => 'Thoracic Aspirator', 
                'price' => 144000, 
                'alkes_category_id' => 3,
                'image_name' => 'thoracic_aspirator'
            ],
            [
                'name' => 'Tracheal Aspirator', 
                'price' => 144000, 
                'alkes_category_id' => 3,
                'image_name' => 'tracheal_aspirator'
            ],
            [
                'name' => 'Suction Pump Saliva', 
                'price' => 144000, 
                'alkes_category_id' => 3,
                'image_name' => 'suction_pump_saliva'
            ],
            [
                'name' => 'Ventilator Transport', 
                'price' => 396000, 
                'alkes_category_id' => 3,
                'image_name' => 'ventilator_transport'
            ],
            [
                'name' => 'High Flow Nasal Cannula', 
                'price' => 396000, 
                'alkes_category_id' => 3,
                'minute_estimation' => 180,
                'image_name' => 'hfnc'
            ],
            
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
