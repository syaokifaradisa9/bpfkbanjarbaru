<!DOCTYPE html>
<html>
    <head>
        <title>LAPORAN KALIBRASI DENTAL UNIT</title>
        <style type="text/css">
            *{
                font-size: 10px;
                font-family: Arial, Helvetica, sans-serif;
                margin: 0px;
                padding: 0px;
            }
            body{
                margin-top: 22px;
                margin-bottom: 20px;
                margin-right: 70px;
            }
            #content{
                margin-left: 125px;
            }
            #title{
                margin-top: 24px;
                font-size: 12px;
                font-weight: bold;
                text-decoration: underline;
            }
            #subtitle{
                font-size: 11px;
            }
            #title, #subtitle{
                text-align: center;
            }
            .text-center{
                text-align: center
            }
            .full-width{
                width: 100%
            }
            .text-left{
                text-align: left;
                vertical-align: text-top;
            }
            .top-margin-spacer{
                margin-top: 8px
            }
            .result-table{
                border: 1px solid black;
                border-collapse: collapse;
                width: 100%;
            }
            .result-table td, .result-table th {
                border: 1px solid black;
                border-collapse: collapse;
            }
            .result-table th{
                padding-left: 5px;
                padding-right: 5px;
                padding-top: 3px;
                padding-bottom: 3px;
            }
            .symbol{
                font-family: DejaVu Sans;
                font-size: 10px !important;
            }
            table tr{
                margin: 0px;
                padding: 0px;
            }
        </style>
        <!-- CSS only -->
    </head>
    <body>
        <p style="float: right; font-size: 8px">LV. 027 - 18</p>
        <p id="title">{{ $data->getCell('A1')->getFormattedValue() }}</p>
        <p id="subtitle">
            {{ $data->getCell('A2')->getFormattedValue() }}
        </p>

        <div id="content">
            <table style="margin-top: 22px">
                <tr>
                    <td style="width: 137px">Merek</td>
                    <td>: {{ $data->getCell('E4')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Model/Tipe</td>
                    <td>: {{ $data->getCell('E5')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">No. Seri</td>
                    <td>: {{ $data->getCell('E6')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tanggal Penerimaan Alat</td>
                    <td>: {{ $data->getCell('E7')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tanggal Pengujian</td>
                    <td>: {{ $data->getCell('E8')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tempat Pengujian</td>
                    <td>: {{ $data->getCell('E9')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Nama Ruang</td>
                    <td>: {{ $data->getCell('E10')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Metode Kerja</td>
                    <td>: {{ $data->getCell('E11')->getFormattedValue() }}</td>
                </tr>
            </table>
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="4" style="width: 25px">I.</th>
                    <th class="text-left" colspan="2">Kondisi Ruang</th>
                </tr>
                <tr>
                    <td style="width: 109px">1. Suhu</td>
                    <td>
                        : {{ $data->getCell('E14')->getFormattedValue()
                        ." ".$data->getCell('F14')->getFormattedValue()
                        ." ".$data->getCell('G14')->getFormattedValue()
                        ." ".$data->getCell('H14')->getFormattedValue() }}
                    </td>
                </tr>
                <tr>
                    <td style="width: 109px">2. Kelembapan</td>
                    <td>
                        : {{ $data->getCell('E15')->getFormattedValue()
                        ." ".$data->getCell('F15')->getFormattedValue()
                        ." ".$data->getCell('G15')->getFormattedValue()
                        ." ".$data->getCell('H15')->getFormattedValue() }}
                    </td>
                </tr>
                <tr>
                    <td style="width: 109px">3. Tegangan Jala - jala</td>
                    <td>
                        : {{ $data->getCell('E16')->getFormattedValue()
                        ." ".$data->getCell('F16')->getFormattedValue()
                        ." ".$data->getCell('G16')->getFormattedValue()
                        ." ".$data->getCell('H16')->getFormattedValue() }}
                    </td>
                </tr>
            </table>
    
            {{-- Pemeriksaan Kondisi Fisik dan Fungsi Alat --}}
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="3" style="width: 25px">II.</th>
                    <th class="text-left" colspan="2">Pemeriksaan Kondisi Fisik dan Fungsi Alat</th>
                </tr>
                <tr>
                    <td style="width: 109px">1. Fisik</td>
                    <td>: {{ $data->getCell('E19')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 109px">2. Fungsi</td>
                    <td>: {{ $data->getCell('E20')->getFormattedValue() }}</td>
                </tr>
            </table>
    
            {{-- Hasil Pengujian Keselamatan Listrik --}}
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="2" style="width: 25px">III.</th>
                    <th class="text-left" colspan="2">Pengujian keselamatan Listrik</th>
                </tr>
                <tr>
                    <td style="width: 100%">
                        <table class="result-table">
                            <tr>
                                <th style="width: 5%">No.</th>
                                <th style="width: 62%">Parameter</th>
                                <th style="width: 15%">Hasil Ukur</th>
                                <th style="width: 18%">Ambang Batas yang Diizinkan</th>
                            </tr>
                            @for ($i = 1; $i <= 3; $i++)
                                <tr>
                                    <td class="text-center">{{ $i }}</td>
                                    <td>{{ $data->getCell('C'.($i + 23))->getFormattedValue() }}</td>
                                    <td class="text-center">
                                        {{ $data->getCell('G'.($i + 23))->getFormattedValue() }} <span class="symbol">{{ $data->getCell('H'.($i + 23))->getFormattedValue() }}</span>
                                    </td>
                                    <td class="text-center symbol">
                                        {{ $data->getCell('I'.($i + 23))->getFormattedValue() }} <span class="symbol">{{ $data->getCell('J'.($i + 23))->getFormattedValue() }}</span>
                                    </td>
                                </tr>
                            @endfor
                        </table>
                    </td>
                </tr>
            </table>
    
            <table class="top-margin-spacer" style="width: 100%">
                <tr>
                    <th class="text-left" rowspan="2" style="width: 25px">IV.</th>
                    <th class="text-left" colspan="2">Pengujian Kinerja</th>
                </tr>
                <tr>
                    <table class="result-table">
                        <tr>
                            <th>No.</th>
                            <th>Parameter</th>
                            <th>Setting Alat</th>
                            <th>Pembacaan <br> Standar</th>
                            <th>Toleransi</th>
                            <th>Ketidakpastian <br> Pengukuran</th>
                        </tr>
                        <?php
                            $col_num = 32;
                            $parameters = [
                                'Illumination (Klux)',
                                'Kecepatan Bor Gigi (RPM)',
                                'Tekanan Semprot Udara (Psi)',
                                'Tekanan Hisap Saliva (mmHg)',
                                'Tekanan Hisap Blood (mmHg)'
                            ];
                        ?>
        
                        @foreach ($parameters as $index => $parameter)
                            @if ($index == 1)
                                @for ($i = 0; $i < 2; $i++)
                                    <tr>
                                        @if ($i == 0)
                                            <td rowspan="2" class="text-center">{{ $index + 1 }}</td>
                                            <td rowspan="2">{{ $parameter }}</td>
                                        @endif
                                        <td class="text-center">{{ $data->getCell('D'.$col_num)->getFormattedValue() }}</td>
                                        <td class="text-center">{{ $data->getCell('F'.$col_num)->getFormattedValue() }}</td>
                                        <td class="text-center symbol">{{ $data->getCell('G'.$col_num)->getFormattedValue() }}</td>
                                        <td class="text-center">{{ $data->getCell('I'.$col_num)->getFormattedValue(). " ". $data->getCell('J'.($i + 33))->getFormattedValue() }}</td>
                                    </tr>
                                    <?php $col_num++; ?>
                                @endfor
                            @else
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $parameter }}</td>
                                    <td class="text-center">{{ $data->getCell('D'.$col_num)->getFormattedValue() }}</td>
                                    <td class="text-center">{{ $data->getCell('F'.$col_num)->getFormattedValue() }}</td>
                                    <td class="text-center symbol">{{ $data->getCell('G'.$col_num)->getFormattedValue() }}</td>
                                    <td class="text-center">{{ $data->getCell('I'.$col_num)->getFormattedValue(). " ". $data->getCell('J'.$col_num)->getFormattedValue() }}</td>
                                </tr>
                                <?php $col_num++; ?>
                            @endif
                        @endforeach
                    </table>
                </tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="9" style="width: 25px">V.</th>
                    <th class="text-left">Keterangan</th>
                </tr>

                @foreach (range(40,47) as $number)
                    <tr>
                        <td>{{ $data->getCell('B'.$number)->getFormattedValue() }}</td>
                    </tr>
                @endforeach
            </table>

            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="5" style="width: 25px">VI.</th>
                    <th class="text-left">Alat Ukur Yang Digunakan</th>
                </tr>

                @foreach (range(51,54) as $number)
                    <tr>
                        <td>{{ $data->getCell('B'.$number)->getFormattedValue() }}</td>
                    </tr>
                @endforeach
            </table>

            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="5" style="width: 25px">VII.</th>
                    <th class="text-left">Kesimpulan</th>
                </tr>

                <tr>
                    <td>
                        {{ $data->getCell('B57')->getFormattedValue() }}
                    </td>
                </tr>
            </table>

            <table>
                <tr>
                    <th class="text-left" rowspan="5" style="width: 25px">VIII.</th>
                    <th class="text-left">Petugas Pengujian</th>
                </tr>

                <tr>
                    <td>
                        {{ $data->getCell('B60')->getFormattedValue() }}
                    </td>
                </tr>
            </table>

            <div style="width: 100%;">
                <table class="top-margin-spacer" style="margin-right: 90px; float: right">
                    <tr>
                        <td class="text-left">Menyetujui, <br> Kepala Instalasi Laboratorium<br>Pengujian dan Kalibrasi</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('digital_sign/Choirul_Huda_Digital_Sign.jpg') }}" alt="" style="width: 113px; height: 113px; margin-top:10px">
                        </td>
                    </tr>
                </table>
            </div>
            {{-- <p class="text-center" style="font-size: 7px; width: 100%">
                Dilarang keras mengutip dan atau mempublikasikan sebagian isi sertifikat ini tanpa seijin LPFK Banjarbaru <br>
                Sertifikat ini sah apabila dibubuhi cap LPFK Banjarbaru dan ditandatangani oleh pejabat yang berwenang
            </p> --}}
        </div>
    </body>
</html>