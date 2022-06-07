<!DOCTYPE html>
<html>
    <head>
        <title>LAPORAN KALIBRASI ELECTROCARDIOGRAPH</title>
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
                    <td>{{ $data->getCell('D4')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Model/Tipe</td>
                    <td>{{ $data->getCell('D5')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">No. Seri</td>
                    <td>{{ $data->getCell('D6')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tanggal Penerimaan Alat</td>
                    <td>{{ $data->getCell('D7')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tanggal Kalibrasi</td>
                    <td>{{ $data->getCell('D8')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tempat Kalibrasi</td>
                    <td>{{ $data->getCell('D9')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Nama Ruang</td>
                    <td>{{ $data->getCell('D10')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Metode Kerja</td>
                    <td>{{ $data->getCell('D11')->getFormattedValue() }}</td>
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
                    <td>{{ $data->getCell('D19')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 109px">2. Fungsi</td>
                    <td>{{ $data->getCell('D20')->getFormattedValue() }}</td>
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
                            @for ($i = 1; $i <= 4; $i++)
                                <tr>
                                    <td class="text-center">{{ $i }}</td>
                                    <td>{{ $data->getCell('C'.($i + 24))->getFormattedValue() }}</td>
                                    <td class="text-center">
                                        {{ $data->getCell('G'.($i + 24))->getFormattedValue() }} <span class="symbol">{{ $data->getCell('H'.($i + 24))->getFormattedValue() }}</span>
                                    </td>
                                    <td class="text-center symbol">
                                        {{ $data->getCell('I'.($i + 24))->getFormattedValue() }} <span class="symbol">{{ $data->getCell('J'.($i + 24))->getFormattedValue() }}</span>
                                    </td>
                                </tr>
                            @endfor
                        </table>
                    </td>
                </tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="14" style="width: 25px">IV.</th>
                    <th class="text-left" colspan="2">Pengujian Kinerja</th>
                </tr>
                <tr>
                    <table>
                        <tr>
                            <th rowspan="2" class="text-left" style="width: 20px">A.</th>
                            <th class="text-left">Pengamatan Visual 12 Lead</th>
                        </tr>
                        <tr>
                            <table class="result-table">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Parameter</th>
                                    <th class="text-center">Setting Standar</th>
                                    <th class="text-center">Hasil Pengamatan</th>
                                </tr>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">Pengamatan Visual 12 Lead</td>
                                    <td class="text-center">60 BPM</td>
                                    <td class="text-center">{{ $data->getCell('F34')->getFormattedValue() }}</td>
                                </tr>
                            </table>
                        </tr>
                    </table>
                </tr>
                <tr></tr>
                <tr>
                    <table>
                        <tr>
                            <th rowspan="2" class="text-left" style="width: 20px">B.</th>
                            <th class="text-left">Kalibrasi Level Tegangan / Amplitudo</th>
                        </tr>
                        <tr>
                            <table class="result-table">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Parameter</th>
                                    <th class="text-center">Setting Standar</th>
                                    <th class="text-center">Setting Alat <br> (mm/mV)</th>
                                    <th class="text-center">Tinggi Pulsa Amplitudo</th>
                                    <th class="text-center">Pembacaan Standar</th>
                                    <th class="text-center">Koreksi <br> (mm)</th>
                                    <th class="text-center">Koreksi Relatif <br> (%)</th>
                                    <th class="text-center">Toleransi <br> (%)</th>
                                    <th class="text-center">Ketidakpastian <br> Pengukuran</th>
                                </tr>
                                @foreach (range(40, 42) as $index => $number)
                                    <tr>
                                        @if ($number == 40)
                                            <td class="text-center" rowspan="3">1</td>
                                            <td class="text-center" rowspan="3">{{ $data->getCell('C40')->getFormattedValue() }}</td>
                                            <td class="text-center" rowspan="3">{{ $data->getCell('D40')->getFormattedValue() }}</td>
                                        @endif
                                        @foreach (range('E', 'I') as $letter)
                                            <td class="text-center">{{ $data->getCell($letter.$number)->getFormattedValue() }}</td>
                                        @endforeach
                                        @if ($number == 40)
                                            <td class="text-center" rowspan="3">{{ $data->getCell('J40')->getFormattedValue() }}</td>
                                        @endif
                                        <td class="text-center">{{ $data->getCell('K'.$number)->getFormattedValue(). " ". $data->getCell('L'.$number)->getFormattedValue() }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </tr>
                    </table>
                </tr>
                <tr></tr>
                <tr>
                    <table>
                        <tr>
                            <th rowspan="2" class="text-left" style="width: 20px">C.</th>
                            <th class="text-left">Kalibrasi Laju Rekaman</th>
                        </tr>
                        <tr>
                            <table class="result-table">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Parameter</th>
                                    <th class="text-center">Setting Standar</th>
                                    <th class="text-center">Setting Alat <br> (mm/mV)</th>
                                    <th class="text-center">Tinggi Pulsa Amplitudo</th>
                                    <th class="text-center">Pembacaan Standar</th>
                                    <th class="text-center">Koreksi <br> (mm)</th>
                                    <th class="text-center">Koreksi Relatif <br> (%)</th>
                                    <th class="text-center">Toleransi <br> (%)</th>
                                    <th class="text-center">Ketidakpastian <br> Pengukuran</th>
                                </tr>
                                @foreach (range(47, 48) as $index => $number)
                                    <tr>
                                        <td class="text-center">{{ $index+1 }}</td>
                                        @if ($number == 47)
                                            <td class="text-center" rowspan="2">{{ $data->getCell('C47')->getFormattedValue() }}</td>
                                            <td class="text-center" rowspan="2">{{ $data->getCell('D47')->getFormattedValue() }}</td>
                                        @endif
                                        @foreach (range('E', 'I') as $letter)
                                            <td class="text-center">{{ $data->getCell($letter.$number)->getFormattedValue() }}</td>
                                        @endforeach
                                        @if ($number == 47)
                                            <td class="text-center" rowspan="2">{{ $data->getCell('J47')->getFormattedValue() }}</td>
                                        @endif
                                        <td class="text-center">{{ $data->getCell('K'.$number)->getFormattedValue(). " ". $data->getCell('L'.$number)->getFormattedValue() }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </tr>
                    </table>
                </tr>
                <tr></tr>
                <tr>
                    <table>
                        <tr>
                            <th rowspan="2" class="text-left" style="width: 20px">D.</th>
                            <th class="text-left">Kalibrasi Sinyal Sinusoida</th>
                        </tr>
                        <tr>
                            <table class="result-table">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Parameter</th>
                                    <th class="text-center">Setting Standar</th>
                                    <th class="text-center">Setting Alat <br> (mm/mV)</th>
                                    <th class="text-center">Tinggi Pulsa Amplitudo</th>
                                    <th class="text-center">Pembacaan Standar</th>
                                    <th class="text-center">Koreksi <br> (mm)</th>
                                    <th class="text-center">Koreksi Relatif <br> (%)</th>
                                    <th class="text-center">Toleransi <br> (%)</th>
                                    <th class="text-center">Ketidakpastian <br> Pengukuran</th>
                                </tr>
                                <tr>
                                    <td class="text-center">1</td>
                                    @foreach (range('C', 'J') as $letter)
                                        <td class="text-center">{{ $data->getCell($letter.'53')->getFormattedValue() }}</td>
                                    @endforeach
                                    <td class="text-center">{{ $data->getCell('K53')->getFormattedValue(). " ". $data->getCell('L53')->getFormattedValue() }}</td>
                                </tr>
                            </table>
                        </tr>
                    </table>
                </tr>
                <tr></tr>
                <tr>
                    <table>
                        <tr>
                            <th rowspan="2" class="text-left" style="width: 20px">E.</th>
                            <th class="text-left">Kalibrasi Sinyal ECG Normal</th>
                        </tr>
                        <tr>
                            <table class="result-table">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Parameter</th>
                                    <th class="text-center">Setting Standar</th>
                                    <th class="text-center">Setting Alat <br> (mm/mV)</th>
                                    <th class="text-center">Tinggi Pulsa Amplitudo</th>
                                    <th class="text-center">Pembacaan Standar</th>
                                    <th class="text-center">Koreksi <br> (mm)</th>
                                    <th class="text-center">Koreksi Relatif <br> (%)</th>
                                    <th class="text-center">Toleransi <br> (%)</th>
                                    <th class="text-center">Ketidakpastian <br> Pengukuran</th>
                                </tr>
                                <tr>
                                    <td class="text-center">1</td>
                                    @foreach (range('C', 'J') as $letter)
                                        <td class="text-center">{{ $data->getCell($letter.'58')->getFormattedValue() }}</td>
                                    @endforeach
                                    <td class="text-center">{{ $data->getCell('K58')->getFormattedValue(). " ". $data->getCell('L58')->getFormattedValue() }}</td>
                                </tr>
                            </table>
                        </tr>
                    </table>
                </tr>
            </table>
    
            <table class="top-margin-spacer">
                <?php $rowspan = 1;?>
                @foreach (range(71, 75) as $number)
                    @if ($data->getCell('B'.$number)->getFormattedValue() != "")
                        <?php $rowspan++;?>
                    @endif
                @endforeach
                <tr>
                    <th class="text-left" rowspan="{{ $rowspan }}" style="width: 25px">V.</th>
                    <th class="text-left">Keterangan</th>
                </tr>

                @foreach (range(71, 75) as $number)
                    @if ($data->getCell('B'.$number)->getFormattedValue() != "")
                        <tr>
                            <td>{{ $data->getCell('B'.$number)->getFormattedValue() }}</td>
                        </tr>
                    @endif
                @endforeach
            </table>

            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="4" style="width: 25px">VI.</th>
                    <th class="text-left">Alat Yang Digunakan</th>
                </tr>

                @foreach (range(79, 81) as $number)
                    <tr>
                        <td>{{ $data->getCell('B'.$number)->getFormattedValue() }}</td>
                    </tr>
                @endforeach
            </table>

            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="5" style="width: 25px">VII.</th>
                    <th class="text-left" colspan="2">Kesimpulan</th>
                </tr>

                <tr><td>{{ $data->getCell('B84')->getFormattedValue() }}</td></tr>
            </table>

            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="2" style="width: 25px">VIII.</th>
                    <th class="text-left">Petugas Kalibrasi</th>
                </tr>

                <tr><td>{{ $data->getCell('B88')->getFormattedValue() }}</td></tr>
            </table>

            <div style="width: 100%;">
                <table class="top-margin-spacer" style="margin-right: 90px; float: right">
                    <tr>
                        <td class="text-left">Menyetujui, <br> Kepala Instalasi Laboratorium<br>Pengujian dan Kalibrasi</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('img/choirul_huda_DS.jpg') }}" alt="" style="width: 113px; height: 113px; margin-top:10px">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>