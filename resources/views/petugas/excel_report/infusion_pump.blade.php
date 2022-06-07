<!DOCTYPE html>
<html>
    <head>
        <title>LAPORAN KALIBRASI INFUSION PUMP</title>
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
                    <td style="width: 137px"><p style="font-family: Arial, Helvetica, sans-serif">Merek</p></td>
                    <td>: {{ $data->getCell('E5')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Model/Tipe</td>
                    <td>: {{ $data->getCell('E6')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">No. Seri</td>
                    <td>: {{ $data->getCell('E7')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Resolusi <span style="margin-left: 12px">{{ $data->getCell('C8')->getFormattedValue() }}</span></td>
                    <td>: {{ $data->getCell('E8')->getFormattedValue() }} ml/h</td>
                </tr>
                <tr>
                    <td><span style="margin-left: 5px">{{ $data->getCell('C9')->getFormattedValue() }}</span></td>
                    <td>: {{ $data->getCell('E9')->getFormattedValue() }} ml/h</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tanggal Penerimaan Alat</td>
                    <td>: {{ $data->getCell('E10')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tanggal Kalibrasi</td>
                    <td>: {{ $data->getCell('E11')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tempat Kalibrasi</td>
                    <td>: {{ $data->getCell('E12')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Nama Ruang</td>
                    <td>: {{ $data->getCell('E13')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Metode Kerja</td>
                    <td>: {{ $data->getCell('E14')->getFormattedValue() }}</td>
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
                        : {{ $data->getCell('E17')->getFormattedValue()
                        ." ".$data->getCell('F17')->getFormattedValue()
                        ." ".$data->getCell('G17')->getFormattedValue()
                        ." ".$data->getCell('H17')->getFormattedValue() }}
                    </td>
                </tr>
                <tr>
                    <td style="width: 109px">2. Kelembapan</td>
                    <td>
                        : {{ $data->getCell('E18')->getFormattedValue()
                        ." ".$data->getCell('F18')->getFormattedValue()
                        ." ".$data->getCell('G18')->getFormattedValue()
                        ." ".$data->getCell('H18')->getFormattedValue() }}
                    </td>
                </tr>
                <tr>
                    <td style="width: 109px">3. Tegangan Jala - jala</td>
                    <td>
                        : {{ $data->getCell('E19')->getFormattedValue()
                        ." ".$data->getCell('F19')->getFormattedValue()
                        ." ".$data->getCell('G19')->getFormattedValue()
                        ." ".$data->getCell('H19')->getFormattedValue() }}
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
                    <td>: {{ $data->getCell('E22')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 109px">2. Fungsi</td>
                    <td>: {{ $data->getCell('E22')->getFormattedValue() }}</td>
                </tr>
            </table>
    
            {{-- Hasil Pengujian Keselamatan Listrik --}}
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="2" style="width: 25px">III.</th>
                    <th class="text-left" colspan="2">Hasil Pengujian keselamatan Listrik</th>
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
                            <tr>
                                <td class="text-center">1</td>
                                <td>{{ $data->getCell('C27')->getFormattedValue() }}</td>
                                <td class="text-center">
                                    {{ $data->getCell('H27')->getFormattedValue() }} <span class="symbol">{{ $data->getCell('I27')->getFormattedValue() }}</span>
                                </td>
                                <td class="text-center">{{ "> ".$data->getCell('J27')->getFormattedValue() }} <span class="symbol"> {{ $data->getCell('K27')->getFormattedValue() }}</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>{{ $data->getCell('C28')->getFormattedValue() }}</td>
                                <td class="text-center">
                                    {{ $data->getCell('H28')->getFormattedValue() }} <span class="symbol">{{ $data->getCell('I28')->getFormattedValue() }}</span>
                                </td>
                                <td class="text-center"><span class="symbol">&le;</span> {{ $data->getCell('J28')->getFormattedValue()}}  <span class="symbol"> {{ $data->getCell('K28')->getFormattedValue() }}</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>{{ $data->getCell('C29')->getFormattedValue() }}</td>
                                <td class="text-center">
                                    {{ $data->getCell('H29')->getFormattedValue() }} <span class="symbol">{{ $data->getCell('I29')->getFormattedValue() }}</span>
                                </td>
                                <td class="text-center"><span class="symbol">&le;</span> {{ $data->getCell('J29')->getFormattedValue() }}  <span class="symbol"> {{ $data->getCell('K29')->getFormattedValue() }}</span></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="3" style="width: 25px">IV.</th>
                    <th class="text-left" colspan="2" >Hasil Pengukuran Kinerja</th>
                </tr>
                {{-- Hasil Pengukuran 1 --}}
                <tr>
                    <td class="full-width">
                        <table class="result-table">
                            <tr>
                                <th style="width: 5%">No.</th>
                                <th style="width: 17%">Parameter</th>
                                <th style="width: 15%">Setting Alat</th>
                                <th style="width: 17%">Pembacaan Standar</th>
                                <th style="width: 15%">Koreksi</th>
                                <th style="width: 14%">Toleransi</th>
                                <th style="width: 17%">Ketidakpastian Pengukuran</th>
                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center" rowspan="4">Flowrate (ml/h)</td>
                                <td class="text-center">{{ $data->getCell('D34')->getFormattedValue() }}</td>
                                <td class="text-center">{{ $data->getCell('F34')->getFormattedValue() }}</td>
                                <td class="text-center">{{ $data->getCell('G34')->getFormattedValue() }}</td>
                                <td class="text-center" rowspan="4">{{ $data->getCell('I34')->getFormattedValue()." ".$data->getCell('H34')->getFormattedValue().' %' }}</td>
                                <td class="text-center">{{ $data->getCell('I34')->getFormattedValue()." ".$data->getCell('J34')->getCalculatedValue() }}</td>
                            </tr>
                            @for ($i = 2; $i <= 4; $i++)
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">{{ $data->getCell('D'.($i + 33))->getFormattedValue() }}</td>
                                    <td class="text-center">{{ $data->getCell('F'.($i + 33))->getFormattedValue() }}</td>
                                    <td class="text-center">{{ $data->getCell('G'.($i + 33))->getFormattedValue() }}</td>
                                    <td class="text-center">{{ $data->getCell('I'.($i + 33))->getFormattedValue()." ".$data->getCell('J'.($i + 33))->getCalculatedValue() }}</td>
                                </tr>
                            @endfor
                        </table>
                    </td>
                </tr>
                {{-- Hasil Pengukuran 2 --}}
                <tr>
                    <td class="full-width">
                        <table class="result-table top-margin-spacer" style="width: 74%">
                            <tr>
                                <th style="width: 5%">No.</th>
                                <th style="width: 19%">Parameter</th>
                                <th style="width: 41%">Pembacaan Standar</th>
                                <th>Toleransi</th>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td class="text-center">{{ $data->getCell('C40')->getFormattedValue() }}</td>
                                <td class="text-center">{{ $data->getCell('D40')->getFormattedValue() }}</td>
                                <td class="text-center">{{ $data->getCell('I34')->getFormattedValue()." ".$data->getCell('G40')->getFormattedValue()." PSI" }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
    
            <table class="top-margin-spacer">
                <?php 
                    $rowspan = 7;    
                    foreach ([48, 49] as $number){
                        if($data->getCell('B'.$number)->getFormattedValue() != ""){
                            $rowspan++;
                        }
                    }
                ?>
                <tr>
                    <th class="text-left" rowspan="{{ $rowspan }}" style="width: 25px">V.</th>
                    <th style="text-align: left">Keterangan</th>
                </tr>
                @foreach (range(43, 50) as $number)
                    @if ($data->getCell('B'.$number)->getFormattedValue() != "")
                        <tr><td class="full-width">{{ $data->getCell('B'.$number)->getFormattedValue() }}</td></tr>
                    @endif
                @endforeach
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="3" style="width: 25px">VI.</th>
                    <th class="text-left">Alat Ukur Yang Digunakan</th>
                </tr>
                <tr><td class="full-width">{{ $data->getCell('B53')->getFormattedValue() }}</td></tr>
                <tr><td class="full-width">{{ $data->getCell('B54')->getFormattedValue() }}</td></tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="2" style="width: 25px">VII.</th>
                    <th class="text-left">Kesimpulan</th>
                </tr>
                <tr><td class="full-width">
                    {{ $data->getCell('B57')->getFormattedValue() }}
                </td></tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="2" style="width: 25px">VIII.</th>
                    <th class="text-left">Petugas Kalibrasi</th>
                </tr>
                <tr><td class="full-width">{{ $data->getCell('B61')->getFormattedValue() }}</td></tr>
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