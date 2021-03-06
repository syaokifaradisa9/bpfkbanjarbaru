<?php

namespace Database\Seeders;

use App\Models\MeasuringInstrument;
use Illuminate\Database\Seeder;

class MeasuringInstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anak_timbangan_standar = [
            [
                'id' => 'ATS1',
                'name' => 'Anak Timbangan Standar',
                'merk' => 'HÄFNER',
                'type_model' => '7.MEHM-210',
                'type_model_category' => 'Tipe',
                'serial_number' => '2790715'
            ],[
                'id' => 'ATS2',
                'name' => 'Anak Timbangan Standar',
                'merk' => 'HÄFNER',
                'type_model' => '7.MEHM-210',
                'type_model_category' => 'Tipe',
                'serial_number' => '1060716'
            ],[
                'id' => 'ATS3',
                'name' => 'Anak Timbangan Standar',
                'merk' => 'HÄFNER',
                'type_model' => '7.MEHM-210',
                'type_model_category' => 'Tipe',
                'serial_number' => '1840819'
            ],[
                'id' => 'ATS4',
                'name' => 'Anak Timbangan Standar',
                'merk' => 'HÄFNER',
                'type_model' => '7.MEHM-210',
                'type_model_category' => 'Tipe',
                'serial_number' => '1850819'
            ],[
                'id' => 'ATS5',
                'name' => 'Anak Timbangan Standar',
                'merk' => 'HÄFNER',
                'type_model' => '7.MEHM-210',
                'type_model_category' => 'Tipe',
                'serial_number' => '4490920'
            ],[
                'id' => 'ATS6',
                'name' => 'Anak Timbangan Standar',
                'merk' => 'HÄFNER',
                'type_model' => '7.MEHM-210',
                'type_model_category' => 'Tipe',
                'serial_number' => '4470920'
            ],[
                'id' => 'ATS7',
                'name' => 'Anak Timbangan Standar',
                'merk' => 'HÄFNER',
                'type_model' => '7.MEHM-210',
                'type_model_category' => 'Tipe',
                'serial_number' => '4480920'
            ],
        ];

        $digital_caliper = [
            [
                'id' => 'DCP1',
                'name' => 'Digital Caliper',
                'merk' => 'Mitutoyo',
                'type_model' => 'CD-6"PSX',
                'serial_number' => '11011858'
            ],[
                'id' => 'DCP2',
                'name' => 'Digital Caliper',
                'merk' => 'Mitutoyo',
                'type_model' => 'CD-6"PSX',
                'serial_number' => '11015608'
            ],[
                'id' => 'DCP3',
                'name' => 'Digital Caliper',
                'merk' => 'Mitutoyo',
                'type_model' => 'CD-6"PSX',
                'serial_number' => '07414369'
            ],[
                'id' => 'DCP4',
                'name' => 'Digital Caliper',
                'merk' => 'Mitutoyo',
                'type_model' => 'CD-6"PSX',
                'serial_number' => '07414785'
            ],[
                'id' => 'DCP5',
                'name' => 'Digital Caliper',
                'merk' => 'Mitutoyo',
                'type_model' => 'CD-6"PSX',
                'serial_number' => '07414362'
            ],[
                'id' => 'DCP6',
                'name' => 'Digital Caliper',
                'merk' => 'Mitutoyo',
                'type_model' => 'CD-6"PSX',
                'serial_number' => '07414353'
            ],
        ];

        $digital_lux = [
            [
                'id' => 'DLUX1',
                'name' => 'Digital Lux Meter',
                'merk' => 'EXTECH',
                'type_model' => 'Easy View 30',
                'serial_number' => '110705877'
            ],[
                'id' => 'DLUX2',
                'name' => 'Digital Lux Meter',
                'merk' => 'EXTECH',
                'type_model' => 'Easy View 30',
                'serial_number' => '110705875'
            ],[
                'id' => 'DLUX3',
                'name' => 'Digital Lux Meter',
                'merk' => 'EXTECH',
                'type_model' => 'Easy View 30',
                'serial_number' => '110705875'
            ],[
                'id' => 'DLUX4',
                'name' => 'Digital Lux Meter',
                'merk' => 'EXTECH',
                'type_model' => 'Easy View 30',
                'serial_number' => '190102372'
            ],[
                'id' => 'DLUX5',
                'name' => 'Digital Lux Meter',
                'merk' => 'EXTECH',
                'type_model' => 'Easy View 30',
                'serial_number' => '190412114'
            ],[
                'id' => 'DLUX6',
                'name' => 'Digital Lux Meter',
                'merk' => 'EXTECH',
                'type_model' => 'Easy View 30',
                'serial_number' => '190509514'
            ],[
                'id' => 'DLUX7',
                'name' => 'Digital Lux Meter',
                'merk' => 'KIMO',
                'type_model' => 'LX200',
                'serial_number' => '1300251'
            ],
        ];

        $digital_pressure_meter = [
            [
                'id' => 'DPM1',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '1831021'
            ],[
                'id' => 'DPM2',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '1831023'
            ],[
                'id' => 'DPM3',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke',
                'type_model' => 'DPM 4-2H',
                'serial_number' => '3191005'
            ],[
                'id' => 'DPM4',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '4414016'
            ],[
                'id' => 'DPM5',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '4414018',
            ],[
                'id' => 'DPM6',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke',
                'type_model' => 'DPM 4-2H',
                'serial_number' => '66111021',
            ],[
                'id' => 'DPM7',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '4821027',
            ],[
                'id' => 'DPM8',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '4600002',
            ],[
                'id' => 'DPM9',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '484821028',
            ],[
                'id' => 'DPM10',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '4819018',
            ],[
                'id' => 'DPM11',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '4813009',
            ],[
                'id' => 'DPM12',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'DPM 4-1H',
                'serial_number' => '3505042',
            ],[
                'id' => 'DPM13',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'DPM 4-1H',
                'serial_number' => '3534043',
            ],[
                'id' => 'DPM14',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'DPM 4-1H',
                'serial_number' => '3506049',
            ],[
                'id' => 'DPM15',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'DPM 4-1H',
                'serial_number' => '3505041',
            ],[
                'id' => 'DPM16',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'DPM 4-1H',
                'serial_number' => '3787040',
            ],[
                'id' => 'DPM17',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'DPM 4-1H',
                'serial_number' => '3191005',
            ],[
                'id' => 'DPM18',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '1831021'
            ],[
                'id' => 'DPM19',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '1831023'
            ],[
                'id' => 'DPM20',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '4414016'
            ],[
                'id' => 'DPM21',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '4414018'
            ],[
                'id' => 'DPM22',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '4611021'
            ],[
                'id' => 'DPM23',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '4821027'
            ],[
                'id' => 'DPM24',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '4600002'
            ],[
                'id' => 'DPM25',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '4821028'
            ],[
                'id' => 'DPM26',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '4819018'
            ],[
                'id' => 'DPM27',
                'name' => 'Digital Pressure Meter',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'DPM 4-2G',
                'serial_number' => '4813009'
            ],
        ];

        $digital_tachometer = [
            [
                'id' => 'DT1',
                'name' => 'Digital Tachometer',
                'merk' => 'Compact Instrument',
                'type_model' => 'CT6/LSR/ERP',
                'serial_number' => '631339'
            ],[
                'id' => 'DT2',
                'name' => 'Digital Tachometer',
                'merk' => 'Compact Instrument',
                'type_model' => 'CT6/LSR/ERP',
                'serial_number' => '631340'
            ],[
                'id' => 'DT3',
                'name' => 'Digital Tachometer',
                'merk' => 'Compact Instrument',
                'type_model' => 'CT6/LSR/ERP',
                'serial_number' => '631341'
            ],[
                'id' => 'DT4',
                'name' => 'Digital Tachometer',
                'merk' => 'Compact Instrument',
                'type_model' => 'CT6/LSR/ERP',
                'serial_number' => '632334'
            ],[
                'id' => 'DT5',
                'name' => 'Digital Tachometer',
                'merk' => 'Krisbow',
                'type_model' => 'KW06-563',
                'serial_number' => '180812179'
            ],[
                'id' => 'DT6',
                'name' => 'Digital Tachometer',
                'merk' => 'Krisbow',
                'type_model' => 'KW06-563',
                'serial_number' => '180812200'
            ],[
                'id' => 'DT7',
                'name' => 'Digital Tachometer',
                'merk' => 'Krisbow',
                'type_model' => 'KW06-563',
                'serial_number' => '180812206'
            ],
        ];

        $digital_thermohygrometer = [
            [
                'id' => 'DTM1',
                'name' => 'Digital Thermohygrometer',
                'merk' => 'KIMO',
                'type_model' => 'KH-210',
                'serial_number' => '14082463'
            ],[
                'id' => 'DTM2',
                'name' => 'Digital Thermohygrometer',
                'merk' => 'KIMO',
                'type_model' => 'KH-210',
                'serial_number' => '15062875'
            ],[
                'id' => 'DTM3',
                'name' => 'Digital Thermohygrometer',
                'merk' => 'KIMO',
                'type_model' => 'KH-210',
                'serial_number' => '15062874'
            ],[
                'id' => 'DTM4',
                'name' => 'Digital Thermohygrometer',
                'merk' => 'KIMO',
                'type_model' => 'KH-210-AO',
                'serial_number' => '15062872'
            ],[
                'id' => 'DTM5',
                'name' => 'Digital Thermohygrometer',
                'merk' => 'KIMO',
                'type_model' => 'KH-210-AO',
                'serial_number' => '15062873'
            ],[
                'id' => 'DTM6',
                'name' => 'Digital Thermohygrometer',
                'merk' => 'Sekonic',
                'type_model' => 'ST - 50A',
                'serial_number' => 'HE 21-000670'
            ],[
                'id' => 'DTM7',
                'name' => 'Digital Thermohygrometer',
                'merk' => 'Sekonic',
                'type_model' => 'ST - 50A',
                'serial_number' => 'HE 21-000669'
            ],[
                'id' => 'DTM8',
                'name' => 'Digital Thermohygrometer',
                'merk' => 'Sekonic',
                'type_model' => 'ST-50',
                'serial_number' => 'HE 01 - 203004'
            ],[
                'id' => 'DTM9',
                'name' => 'Digital Thermohygrometer',
                'merk' => 'KIMO',
                'type_model' => 'KH-210-AO',
                'serial_number' => '14082463'
            ],[
                'id' => 'DTM10',
                'name' => 'Digital Thermohygrometer',
                'merk' => 'KIMO',
                'type_model' => 'KH-210-AO',
                'serial_number' => '15062875'
            ],[
                'id' => 'DTM11',
                'name' => 'Digital Thermohygrometer',
                'merk' => 'KIMO',
                'type_model' => 'KH-210-AO',
                'serial_number' => '15062874'
            ],
        ];

        $digital_thermohygrobarometer = [
            [
                'id' => 'DTBM1',
                'name' => 'Digital Thermohygrobarometer',
                'merk' => 'Greisinger',
                'type_model' => 'GFTB 200',
                'serial_number' => '34903046'
            ],[
                'id' => 'DTBM2',
                'name' => 'Digital Thermohygrobarometer',
                'merk' => 'Greisinger',
                'type_model' => 'GFTB 200',
                'serial_number' => '34903051'
            ],[
                'id' => 'DTBM3',
                'name' => 'Digital Thermohygrobarometer',
                'merk' => 'Greisinger',
                'type_model' => 'GFTB 200',
                'serial_number' => '34903053'
            ],[
                'id' => 'DTBM4',
                'name' => 'Digital Thermohygrobarometer',
                'merk' => 'Greisinger',
                'type_model' => 'GFTB 200',
                'serial_number' => '34904091'
            ],[
                'id' => 'DTBM5',
                'name' => 'Digital Thermohygrobarometer',
                'merk' => 'Greisinger',
                'type_model' => 'GFTB 200',
                'serial_number' => '3490333'
            ],[
                'id' => 'DTBM6',
                'name' => 'Digital Thermohygrobarometer',
                'merk' => 'Greisinger',
                'type_model' => 'GFTB 200',
                'serial_number' => '34903050'
            ],[
                'id' => 'DTBM7',
                'name' => 'Digital Thermohygrobarometer',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100609'
            ],[
                'id' => 'DTBM8',
                'name' => 'Digital Thermohygrobarometer',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100611'
            ],[
                'id' => 'DTBM9',
                'name' => 'Digital Thermohygrobarometer',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100586'
            ],[
                'id' => 'DTBM10',
                'name' => 'Digital Thermohygrobarometer',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100616'
            ],[
                'id' => 'DTBM11',
                'name' => 'Digital Thermohygrobarometer',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100618'
            ],[
                'id' => 'DTBM12',
                'name' => 'Digital Thermohygrobarometer',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100617'
            ],[
                'id' => 'DTBM13',
                'name' => 'Digital Thermohygrobarometer',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100615'
            ],[
                'id' => 'DTBM14',
                'name' => 'Digital Thermohygrobarometer',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100605'
            ],[
                'id' => 'DTBM15',
                'name' => 'Digital Thermohygrobarometer',
                'merk' => 'Greisinger',
                'type_model' => 'GFTB 200',
                'serial_number' => '34903334'
            ]
        ];

        $electrical_safety_analyzer = [
            [
                'id' => 'ESA1',
                'name' => 'Electrical Safety Analyzer',
                'merk' => 'Fluke',
                'type_model' => 'ESA 620',
                'serial_number' => '1837056'
            ],[
                'id' => 'ESA2',
                'name' => 'Electrical Safety Analyzer',
                'merk' => 'Fluke',
                'type_model' => 'ESA 620',
                'serial_number' => '1834020'
            ],[
                'id' => 'ESA3',
                'name' => 'Electrical Safety Analyzer',
                'merk' => 'Fluke',
                'type_model' => 'ESA 615',
                'serial_number' => '2853077'
            ],[
                'id' => 'ESA4',
                'name' => 'Electrical Safety Analyzer',
                'merk' => 'Fluke',
                'type_model' => 'ESA 615',
                'serial_number' => '2853078'
            ],[
                'id' => 'ESA5',
                'name' => 'Electrical Safety Analyzer',
                'merk' => 'Fluke',
                'type_model' => 'ESA 615',
                'serial_number' => '3148907'
            ],[
                'id' => 'ESA6',
                'name' => 'Electrical Safety Analyzer',
                'merk' => 'Fluke',
                'type_model' => 'ESA 615',
                'serial_number' => '3148908'
            ],[
                'id' => 'ESA7',
                'name' => 'Electrical Safety Analyzer',
                'merk' => 'Fluke',
                'type_model' => 'ESA 615',
                'serial_number' => '3699030'
            ],[
                'id' => 'ESA8',
                'name' => 'Electrical Safety Analyzer',
                'merk' => 'Fluke',
                'type_model' => 'ESA 615',
                'serial_number' => '4669058'
            ],[
                'id' => 'ESA9',
                'name' => 'Electrical Safety Analyzer',
                'merk' => 'Fluke',
                'type_model' => 'ESA 615',
                'serial_number' => '4670010'
            ],
        ];

        $fetal_simulator = [
            [
                'id' => 'FS1',
                'name' => 'Fetal Simulator',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'PS 320',
                'serial_number' => '1828012'
            ],[
                'id' => 'FS2',
                'name' => 'Fetal Simulator',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'PS 320',
                'serial_number' => '1828016'
            ],[
                'id' => 'FS3',
                'name' => 'Fetal Simulator',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'PS 320',
                'serial_number' => '3204002'
            ],[
                'id' => 'FS4',
                'name' => 'Fetal Simulator',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'PS 320',
                'serial_number' => '3204003'
            ],[
                'id' => 'FS5',
                'name' => 'Fetal Simulator',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'PS 320',
                'serial_number' => '4312020'
            ],[
                'id' => 'FS6',
                'name' => 'Fetal Simulator',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'PS 320',
                'serial_number' => '4662032'
            ],[
                'id' => 'FS7',
                'name' => 'Fetal Simulator',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'PS 320',
                'serial_number' => '4662033'
            ],
        ];

        $gas_flow_analyzer = [
            [
                'id' => 'GFA1',
                'name' => 'Gas Flow Analyzer',
                'merk' => 'Fluke',
                'type_model' => 'VT305',
                'serial_number' => 'BF100519'
            ],[
                'id' => 'GFA2',
                'name' => 'Gas Flow Analyzer',
                'merk' => 'Fluke',
                'type_model' => 'VT Plus HF',
                'serial_number' => '2847038'
            ],[
                'id' => 'GFA3',
                'name' => 'Gas Flow Analyzer',
                'merk' => 'IMT Medical',
                'type_model' => 'PF-300',
                'serial_number' => 'BA101580'
            ],[
                'id' => 'GFA4',
                'name' => 'Gas Flow Analyzer',
                'merk' => 'IMT Medical',
                'type_model' => 'PF-300',
                'serial_number' => 'BA120302'
            ],[
                'id' => 'GFA5',
                'name' => 'Gas Flow Analyzer',
                'merk' => 'Fluke',
                'type_model' => 'VT305',
                'serial_number' => 'BF102163'
            ],[
                'id' => 'GFA6',
                'name' => 'Gas Flow Analyzer',
                'merk' => 'Fluke',
                'type_model' => 'VT305',
                'serial_number' => 'BF102142'
            ],[
                'id' => 'GFA7',
                'name' => 'Gas Flow Analyzer',
                'merk' => 'Rigel',
                'type_model' => 'Ventest 800',
                'serial_number' => 'BA120986'
            ],[
                'id' => 'GFA8',
                'name' => 'Gas Flow Analyzer',
                'merk' => 'Rigel',
                'type_model' => 'Ventest 800',
                'serial_number' => 'BA120987'
            ],[
                'id' => 'GFA9',
                'name' => 'Gas Flow Analyzer',
                'merk' => 'Rigel',
                'type_model' => 'Ventest 800',
                'serial_number' => 'BA200651'
            ],[
                'id' => 'GFA10',
                'name' => 'Gas Flow Analyzer',
                'merk' => 'Fluke',
                'type_model' => 'VT900A',
                'serial_number' => '5101035-5102036'
            ],[
                'id' => 'GFA11',
                'name' => 'Gas Flow Analyzer',
                'merk' => 'Fluke',
                'type_model' => 'VT900A',
                'serial_number' => '5101752-5102038'
            ],
        ];

        $handheld_nibp_simulator = [
            [
                'id' => 'HNIBP1',
                'name' => 'Handheld NIBP Simulator',
                'merk' => 'ACCUPULSE PLUS',
                'type_model' => 'AH-2',
                'serial_number' => 'HH12080309'
            ]
        ];

        $lux_tester = [
            [
                'id' => 'LUX1',
                'name' => 'Lux HI Tester',
                'merk' => 'HIOKI',
                'type_model' => '3421',
                'serial_number' => '90130606'
            ]
        ];

        $mobile_corder = [
            [
                'id' => 'MC1',
                'name' => 'Mobile Corder',
                'merk' => 'Yokogawa',
                'type_model' => 'GP 10',
                'serial_number' => 'S5T810599'
            ]
        ];

        $multiparameter_simulator = [
            [
                'id' => 'MSIM1',
                'name' => 'Multiparameter Simulator',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'PS 410',
                'serial_number' => '21033'
            ],[
                'id' => 'MSIM2',
                'name' => 'Multiparameter Simulator',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'PS 420',
                'serial_number' => '1826055'
            ],[
                'id' => 'MSIM3',
                'name' => 'Multiparameter Simulator',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'PS 420',
                'serial_number' => '1827060'
            ],[
                'id' => 'MSIM4',
                'name' => 'Multiparameter Simulator',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'MPS 450',
                'serial_number' => '184633'
            ],[
                'id' => 'MSIM5',
                'name' => 'Multiparameter Simulator',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'MPS 450',
                'serial_number' => '184635'
            ],[
                'id' => 'MSIM6',
                'name' => 'Multiparameter Simulator',
                'merk' => 'RIGEL',
                'type_model' => 'PatSim200',
                'serial_number' => '15L-0684'
            ],[
                'id' => 'MSIM7',
                'name' => 'Multiparameter Simulator',
                'merk' => 'RIGEL',
                'type_model' => 'PatSim200',
                'serial_number' => '11L-0293'
            ],
        ];

        $nibp_simulator = [
            [
                'id' => 'NIBP1',
                'name' => 'NIBP Simulator',
                'merk' => 'RIGEL',
                'type_model' => 'BP-SIM',
                'serial_number' => '44L-1084'
            ],[
                'id' => 'NIBP2',
                'name' => 'NIBP Simulator',
                'merk' => 'RIGEL',
                'type_model' => 'BP-SIM',
                'serial_number' => '12L-0534'
            ],[
                'id' => 'NIBP3',
                'name' => 'NIBP Simulator',
                'merk' => 'RIGEL',
                'type_model' => 'BP-SIM',
                'serial_number' => '12L-0536'
            ],[
                'id' => 'NIBP4',
                'name' => 'NIBP Simulator',
                'merk' => 'RIGEL',
                'type_model' => 'BP-SIM',
                'serial_number' => '44L-1084'
            ],[
                'id' => 'NIBP5',
                'name' => 'NIBP Simulator',
                'merk' => 'RIGEL',
                'type_model' => 'BP-SIM',
                'serial_number' => '06L-0610'
            ],
        ];

        $reference_themometer = [
            [
                'id' => 'RT1',
                'name' => 'Reference Thermometer',
                'merk' => 'APPA',
                'type_model' => 'APPA51',
                'serial_number' => '03002948'
            ],[
                'id' => 'RT2',
                'name' => 'Reference Thermometer',
                'merk' => 'FLUKE',
                'type_model' => '1524',
                'serial_number' => '1803038'
            ],[
                'id' => 'RT3',
                'name' => 'Reference Thermometer',
                'merk' => 'FLUKE',
                'type_model' => '1524',
                'serial_number' => '1803037'
            ],
        ];

        $spo2_simulator = [
            [
                'id' => 'SPO1',
                'name' => 'SPO₂ Simulator',
                'merk' => 'Fluke',
                'type_model' => 'SPOTLIGHT',
                'serial_number' => '2799069'
            ],[
                'id' => 'SPO2',
                'name' => 'SPO₂ Simulator',
                'merk' => 'Fluke',
                'type_model' => 'SPOTLIGHT',
                'serial_number' => '2799009'
            ],[
                'id' => 'SPO3',
                'name' => 'SPO₂ Simulator',
                'merk' => 'Fluke',
                'type_model' => 'SPOTLIGHT',
                'serial_number' => '2812009'
            ],[
                'id' => 'SPO4',
                'name' => 'SPO₂ Simulator',
                'merk' => 'Fluke',
                'type_model' => 'SPOTLIGHT',
                'serial_number' => '4403084'
            ],[
                'id' => 'SPO5',
                'name' => 'SPO₂ Simulator',
                'merk' => 'Fluke',
                'type_model' => 'SPOTLIGHT',
                'serial_number' => '4352022'
            ],[
                'id' => 'SPO6',
                'name' => 'SPO₂ Simulator',
                'merk' => 'Fluke',
                'type_model' => 'SPOTLIGHT',
                'serial_number' => '4404040'
            ],[
                'id' => 'SPO7',
                'name' => 'SPO₂ Simulator',
                'merk' => 'Fluke',
                'type_model' => 'SPOTLIGHT',
                'serial_number' => '4589019'
            ],
        ];  

        $stopwatch = [
            [
                'id' => 'STOP1',
                'name' => 'Stopwatch',
                'merk' => 'Casio',
                'type_model' => 'HS - 80TW',
                'serial_number' => '611Q02R'
            ],[
                'id' => 'STOP2',
                'name' => 'Stopwatch',
                'merk' => 'Casio',
                'type_model' => 'HS - 80TW',
                'serial_number' => '510Q06R'
            ],[
                'id' => 'STOP3',
                'name' => 'Stopwatch',
                'merk' => 'Casio',
                'type_model' => 'HS - 80TW',
                'serial_number' => '605Q11R'
            ],[
                'id' => 'STOP4',
                'name' => 'Stopwatch',
                'merk' => 'Casio',
                'type_model' => 'HS - 80TW',
                'serial_number' => '510Q061R'
            ],[
                'id' => 'STOP5',
                'name' => 'Stopwatch',
                'merk' => 'EXTECH',
                'type_model' => '365535',
                'serial_number' => '001380'
            ],[
                'id' => 'STOP6',
                'name' => 'Stopwatch',
                'merk' => 'EXTECH',
                'type_model' => '365535',
                'serial_number' => '001381'
            ],[
                'id' => 'STOP7',
                'name' => 'Stopwatch',
                'merk' => 'EXTECH',
                'type_model' => '365535',
                'serial_number' => '001382'
            ],[
                'id' => 'STOP8',
                'name' => 'Stopwatch',
                'merk' => 'EXTECH',
                'type_model' => '365535',
                'serial_number' => '001383'
            ],[
                'id' => 'STOP9',
                'name' => 'Stopwatch',
                'merk' => 'EXTECH',
                'type_model' => '365535',
                'serial_number' => '001384'
            ],[
                'id' => 'STOP10',
                'name' => 'Stopwatch',
                'merk' => 'EXTECH',
                'type_model' => '365535',
                'serial_number' => '001385'
            ],[
                'id' => 'STOP11',
                'name' => 'Stopwatch',
                'merk' => 'EXTECH',
                'type_model' => '365535',
                'serial_number' => '001386'
            ],[
                'id' => 'STOP12',
                'name' => 'Stopwatch',
                'merk' => 'EXTECH',
                'type_model' => '365535',
                'serial_number' => '001387'
            ],[
                'id' => 'STOP13',
                'name' => 'Stopwatch',
                'merk' => 'EXTECH',
                'type_model' => '365535',
                'serial_number' => '001445'
            ],[
                'id' => 'STOP14',
                'name' => 'Stopwatch',
                'merk' => 'EXTECH',
                'type_model' => '365535',
                'serial_number' => '001449'
            ],[
                'id' => 'STOP15',
                'name' => 'Stopwatch',
                'merk' => 'EXTECH',
                'type_model' => '365535',
                'serial_number' => '001452'
            ],[
                'id' => 'STOP16',
                'name' => 'Stopwatch',
                'merk' => 'EXTECH',
                'type_model' => '365535',
                'serial_number' => '005018'
            ],
        ];

        $temperature_recorder = [
            [
                'id' => 'TREC1',
                'name' => 'Temperature Recorder',
                'merk' => 'HIOKI',
                'type_model' => 'LR 8410',
                'serial_number' => '200812984'
            ],[
                'id' => 'TREC2',
                'name' => 'Temperature Recorder',
                'merk' => 'HIOKI',
                'type_model' => 'LR 8410',
                'serial_number' => '200812985'
            ],[
                'id' => 'TREC3',
                'name' => 'Temperature Recorder',
                'merk' => 'HIOKI',
                'type_model' => 'LR 8410',
                'serial_number' => '210368322'
            ],[
                'id' => 'TREC4',
                'name' => 'Temperature Recorder',
                'merk' => 'HIOKI',
                'type_model' => 'LR 8410',
                'serial_number' => '210368323'
            ],[
                'id' => 'TREC5',
                'name' => 'Temperature Recorder',
                'merk' => 'HIOKI',
                'type_model' => 'LR 8410',
                'serial_number' => '210368324'
            ],
        ];

        $thermocouple_data_logger = [
            [
                'id' => 'TDL1',
                'name' => 'Thermocouple Data Logger',
                'merk' => 'MADGETECH',
                'type_model' => 'OctTemp 2000',
                'serial_number' => 'P40270'
            ],[
                'id' => 'TDL2',
                'name' => 'Thermocouple Data Logger',
                'merk' => 'MADGETECH',
                'type_model' => 'OctTemp 2000',
                'serial_number' => 'P41878'
            ],
        ];

        $thermohygrolight = [
            [
                'id' => 'TL1',
                'name' => 'Thermohygrolight',
                'merk' => 'KIMO',
                'type_model' => 'HS-210',
                'serial_number' => '14082463'
            ],[
                'id' => 'TL2',
                'name' => 'Thermohygrolight',
                'merk' => 'KIMO',
                'type_model' => 'HS-210',
                'serial_number' => '15062872'
            ],[
                'id' => 'TL3',
                'name' => 'Thermohygrolight',
                'merk' => 'KIMO',
                'type_model' => 'HS-210',
                'serial_number' => '15062873'
            ],[
                'id' => 'TL4',
                'name' => 'Thermohygrolight',
                'merk' => 'KIMO',
                'type_model' => 'HS-210',
                'serial_number' => '15062874'
            ],[
                'id' => 'TL5',
                'name' => 'Thermohygrolight',
                'merk' => 'KIMO',
                'type_model' => 'HS-210',
                'serial_number' => '15062875'
            ],[
                'id' => 'TL6',
                'name' => 'Thermohygrolight',
                'merk' => 'Greisinger',
                'type_model' => 'GFTB 200',
                'serial_number' => '34903046'
            ],[
                'id' => 'TL7',
                'name' => 'Thermohygrolight',
                'merk' => 'Greisinger',
                'type_model' => 'GFTB 200',
                'serial_number' => '34903053'
            ],[
                'id' => 'TL8',
                'name' => 'Thermohygrolight',
                'merk' => 'Greisinger',
                'type_model' => 'GFTB 200',
                'serial_number' => '34903051'
            ],[
                'id' => 'TL9',
                'name' => 'Thermohygrolight',
                'merk' => 'Greisinger',
                'type_model' => 'GFTB 200',
                'serial_number' => '34904091'
            ],[
                'id' => 'TL10',
                'name' => 'Thermohygrolight',
                'merk' => 'Sekonic',
                'type_model' => 'ST-50A',
                'serial_number' => 'HE-21.000669'
            ],[
                'id' => 'TL11',
                'name' => 'Thermohygrolight',
                'merk' => 'Sekonic',
                'type_model' => 'ST-50A',
                'serial_number' => 'HE-21.000670'
            ],[
                'id' => 'TL12',
                'name' => 'Thermohygrolight',
                'merk' => 'KIMO',
                'type_model' => 'KH-210-AO',
                'serial_number' => '15062873'
            ],[
                'id' => 'TL13',
                'name' => 'Thermohygrolight',
                'merk' => 'KIMO',
                'type_model' => 'KH-210-AO',
                'serial_number' => '15062874'
            ],[
                'id' => 'TL14',
                'name' => 'Thermohygrolight',
                'merk' => 'KIMO',
                'type_model' => 'KH-210-AO',
                'serial_number' => '14082463'
            ],[
                'id' => 'TL15',
                'name' => 'Thermohygrolight',
                'merk' => 'KIMO',
                'type_model' => 'KH-210-AO',
                'serial_number' => '15062872'
            ],[
                'id' => 'TL16',
                'name' => 'Thermohygrolight',
                'merk' => 'KIMO',
                'type_model' => 'KH-210-AO',
                'serial_number' => '15062875'
            ],[
                'id' => 'TL17',
                'name' => 'Thermohygrolight',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100611'
            ],[
                'id' => 'TL18',
                'name' => 'Thermohygrolight',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100609'
            ],[
                'id' => 'TL19',
                'name' => 'Thermohygrolight',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100605'
            ],[
                'id' => 'TL20',
                'name' => 'Thermohygrolight',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100617'
            ],[
                'id' => 'TL21',
                'name' => 'Thermohygrolight',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100616'
            ],[
                'id' => 'TL22',
                'name' => 'Thermohygrolight',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100618'
            ],[
                'id' => 'TL23',
                'name' => 'Thermohygrolight',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100586'
            ],[
                'id' => 'TL24',
                'name' => 'Thermohygrolight',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100615'
            ],
        ];

        $thermohygrobarometer = [
            [
                'id' => 'TB1',
                'name' => 'Thermohygrobarometer',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100586'
            ],[
                'id' => 'TB2',
                'name' => 'Thermohygrobarometer',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100605'
            ],[
                'id' => 'TB3',
                'name' => 'Thermohygrobarometer',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100609'
            ],[
                'id' => 'TB4',
                'name' => 'Thermohygrobarometer',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100611'
            ],[
                'id' => 'TB5',
                'name' => 'Thermohygrobarometer',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100615'
            ],[
                'id' => 'TB6',
                'name' => 'Thermohygrobarometer',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100616'
            ],[
                'id' => 'TB7',
                'name' => 'Thermohygrobarometer',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100617'
            ],[
                'id' => 'TB8',
                'name' => 'Thermohygrobarometer',
                'merk' => 'EXTECH',
                'type_model' => 'SD700',
                'serial_number' => 'A.100618'
            ],
        ];

        $universal_biometer = [
            [
                'id' => 'UB1',
                'name' => 'Universal Biometer',
                'merk' => 'Biotek Instrument',
                'type_model' => 'CPM III',
                'serial_number' => '126143'
            ],
        ];

        $vital_sign_simulator = [
            [
                'id' => 'VSS1',
                'name' => 'Vital Sign Simulator',
                'merk' => 'RIGEL',
                'type_model' => 'UNI-SiM',
                'serial_number' => '05J-0804'
            ],[
                'id' => 'VSS2',
                'name' => 'Vital Sign Simulator',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'Prosim 8',
                'serial_number' => '3217028'
            ],[
                'id' => 'VSS3',
                'name' => 'Vital Sign Simulator',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'Prosim 8',
                'serial_number' => '3188428'
            ],[
                'id' => 'VSS4',
                'name' => 'Vital Sign Simulator',
                'merk' => 'RIGEL',
                'type_model' => 'UNI-SiM',
                'serial_number' => '45K-1036'
            ],[
                'id' => 'VSS5',
                'name' => 'Vital Sign Simulator',
                'merk' => 'RIGEL',
                'type_model' => 'UNI-SiM',
                'serial_number' => '45K-1059'
            ],[
                'id' => 'VSS6',
                'name' => 'Vital Sign Simulator',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'Prosim 8',
                'serial_number' => '5144556'
            ],[
                'id' => 'VSS7',
                'name' => 'Vital Sign Simulator',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'Prosim 4',
                'serial_number' => '4422046'
            ],[
                'id' => 'VSS8',
                'name' => 'Vital Sign Simulator',
                'merk' => 'Fluke Biomedical',
                'type_model' => 'Prosim 4',
                'serial_number' => '4416070'
            ]
        ];

        $wireless_temperature_recorder = [
            [
                'id' => 'WTR1',
                'name' => 'Wireless Temperature Recorder',
                'merk' => 'HIOKI',
                'type_model' => 'LR 8510',
                'serial_number' => '200936000'
            ],[
                'id' => 'WTR2',
                'name' => 'Wireless Temperature Recorder',
                'merk' => 'HIOKI',
                'type_model' => 'LR 8510',
                'serial_number' => '200936001'
            ],[
                'id' => 'WTR3',
                'name' => 'Wireless Temperature Recorder',
                'merk' => 'HIOKI',
                'type_model' => 'LR 8510',
                'serial_number' => '200821397'
            ],[
                'id' => 'WTR4',
                'name' => 'Wireless Temperature Recorder',
                'merk' => 'HIOKI',
                'type_model' => 'LR 8510',
                'serial_number' => '210411983'
            ],[
                'id' => 'WTR5',
                'name' => 'Wireless Temperature Recorder',
                'merk' => 'HIOKI',
                'type_model' => 'LR 8510',
                'serial_number' => '210411984'
            ],[
                'id' => 'WTR6',
                'name' => 'Wireless Temperature Recorder',
                'merk' => 'HIOKI',
                'type_model' => 'LR 8510',
                'serial_number' => '210411985'
            ],[
                'id' => 'WTR7',
                'name' => 'Wireless Temperature Recorder',
                'merk' => 'HIOKI',
                'type_model' => 'LR 8510',
                'serial_number' => '210746054'
            ],[
                'id' => 'WTR8',
                'name' => 'Wireless Temperature Recorder',
                'merk' => 'HIOKI',
                'type_model' => 'LR 8510',
                'serial_number' => '210746055'
            ],[
                'id' => 'WTR9',
                'name' => 'Wireless Temperature Recorder',
                'merk' => 'HIOKI',
                'type_model' => 'LR 8510',
                'serial_number' => '210746056'
            ],
        ];

        $measuringInstrument = [
            ...$electrical_safety_analyzer,
            ...$nibp_simulator,
            ...$vital_sign_simulator,
            ...$handheld_nibp_simulator,
            ...$digital_thermohygrometer,
            ...$digital_thermohygrobarometer,
            ...$digital_tachometer,
            ...$stopwatch,
            ...$thermohygrolight,
            ...$thermohygrobarometer,
            ...$digital_lux,
            ...$lux_tester,
            ...$digital_pressure_meter,
            ...$universal_biometer,
            ...$fetal_simulator,
            ...$multiparameter_simulator,
            ...$digital_caliper,
            ...$gas_flow_analyzer,
            ...$thermocouple_data_logger,
            ...$mobile_corder,
            ...$reference_themometer,
            ...$wireless_temperature_recorder,
            ...$temperature_recorder,
            ...$spo2_simulator,
            ...$anak_timbangan_standar
        ];
        foreach($measuringInstrument as $data){
            MeasuringInstrument::create($data);
        }
    }
}
