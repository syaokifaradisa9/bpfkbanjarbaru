@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Lembar Kerja {{ $alkesOrder->alkes->name }}</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Pengajuan Eksternal Pengujian dan Kalibrasi Alat Kesehatan</h2>
      <p class="section-lead">Melakukan pengujian dan kalibrasi di Loka Pengamanan Fasilitas Kesehatan (LPFK) Banjarbaru</p>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Form Lembar Kerja</h4>
            </div>

            {{-- Informasi Sertifikat --}}
            <form action="{{ route('petugas.order.external.worksheet.excel.store', ['order_id' => $order_id, 'alkes_order_id' => $alkesOrder->id]) }}" method="post">
              @csrf

              <div class="card-body px-4">
                <div class="row">
                  <div class="form-group col-2">
                    <label><b>Nomor Sertifikat</b></label>
                    <input type="number" class="form-control" value="{{ $certificate_number }}" name="certificate_number">
                  </div>
                  <div class="form-group col-2">
                    <label><b>Bulan Sertifikat</b></label>
                    <input type="month" class="form-control" value="{{ date('Y-m', time()) }}" name="certificate_date">
                  </div>
                  <div class="form-group ml-3">
                    <label><b>Nomor Order</b></label>
                    <input type="text" class="form-control" value="{{ $alkesOrder->external_order->number }}" name="order_number" readonly>
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="col">
                    <div class="form-group">
                      {{-- Informasi Alat Kesehatan --}}
                      <label><b>Informasi Alat Kesehatan</b></label>
                      <input name="E4" type="text" placeholder="Merek" class="form-control">
                      <input name="E5" type="text" placeholder="Tipe/Model" class="form-control mt-2">
                      <input name="E6" type="text" placeholder="Nomor Seri" class="form-control mt-2">
                    </div>
                  </div>
                  <div class="form-group col">
                    {{-- Kondisi Ruangan --}}
                    <label><b>Kondisi Ruangan</b></label>
                    <div class="row mx-0">
                      <input name="E14" type="text" placeholder="Suhu Awal" class="form-control col">
                      <input name="F14" type="text" placeholder="Suhu Akhir" class="form-control col ml-3">
                    </div>
                    <div class="row mx-0 mt-2">
                      <input name="E15" type="text" placeholder="Kelembapan Awal" class="form-control col">
                      <input name="F15" type="text" placeholder="Kelembapan Akhir" class="form-control col ml-3">
                    </div>
                    <input name="E16" type="text" placeholder="Tegangan jala-jala" class="form-control mt-2">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="form-group col-3">
                    <label><b>Tanggal Penerimaan Alat</b></label>
                    <input name="E7" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tanggal Pengujian</b></label>
                    <input name="E8" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tempat Pengujian</b></label>
                    <input name="E9" type="text" class="form-control" value="{{ $alkesOrder->external_order->user->fasyenkes_name }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Nama Ruang</b></label>
                    <input name="E10" type="text" class="form-control">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Fisik Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="E19" value="Baik" type="radio" id="E19-a" class="custom-control-input">
                      <label class="custom-control-label" for="E19-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="E19" value="Tidak Baik" type="radio" id="E19-b" class="custom-control-input">
                      <label class="custom-control-label" for="E19-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col-2 mx-0 form-group">
                    <label><b>Fungsi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="E20" value="Baik" type="radio" id="E20-a" class="custom-control-input">
                      <label class="custom-control-label" for="E20-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="E20" value="Tidak Baik" type="radio" id="E20-b" class="custom-control-input">
                      <label class="custom-control-label" for="E20-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col"></div>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Pengujian Kinerja</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th class="text-center align-middle">No</th>
                      <th class="text-center align-middle">Parameter</th>
                      <th class="text-center align-middle">Hasil Ukur</th>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">1</td>
                      <td class="align-middle">Resistansi Isolasi</td>
                      <td>
                        <input name="I25" type="text" class="form-control text-center align-middle">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">2</td>
                      <td class="align-middle">
                        <select name="C26" class="form-control">
                          <option value="Resistansi Pembumian Protektif (kabel dapat dilepas)">
                            Resistansi Pembumian Protektif (kabel dapat dilepas)
                          </option>
                          <option value="Resistansi Pembumian Protektif (kabel tidak dapat dilepas)">
                            Resistansi Pembumian Protektif (kabel tidak dapat dilepas)
                          </option>
                        </select>
                      </td>
                      <td>
                        <input name="I26" type="text" class="form-control text-center align-middle">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">3</td>
                      <td class="align-middle">
                        <select name="C27" class="form-control">
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas I">
                            Arus bocor peralatan untuk perangkat elektromedik kelas I
                          </option>
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas II">
                            Arus bocor peralatan untuk perangkat elektromedik kelas II
                          </option>
                        </select>
                      </td>
                      <td>
                        <input name="I27" type="text" class="form-control text-center align-middle">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">4</td>
                      <td class="align-middle">Arus bocor peralatan yang diaplikasikan</td>
                      <td>
                        <input name="I28" type="text" class="form-control text-center align-middle">
                      </td>
                    </tr>
                  </table>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Pengujian Visual 12 Lead</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th class="text-center align-middle">No</th>
                      <th class="text-center align-middle">Parameter</th>
                      <th class="text-center align-middle">Setting Standar</th>
                      <th class="text-center align-middle">Hasil Pengamatan</th>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">1</td>
                      <td class="text-center align-middle">Pengamatan Visual 12 Lead</td>
                      <td class="text-center align-middle">
                        60 BPM
                      </td>
                      <td class="align-middle">
                        <div class="custom-control custom-radio">
                          <input name="F34" value="Baik" type="radio" id="F34-a" class="custom-control-input">
                          <label class="custom-control-label" for="F34-a">Baik</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input name="F34" value="Tidak Baik" type="radio" id="F34-b" class="custom-control-input">
                          <label class="custom-control-label" for="F34-b">Tidak Baik</label>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>

                <div class="form-group mt-3">
                  <label><b>Kalibrasi Level Tegangan/Amplitudo</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th rowspan="2" class="text-center align-middle">No</th>
                      <th rowspan="2" class="text-center align-middle">Parameter</th>
                      <th rowspan="2" class="text-center align-middle">Setting Alat</th>
                      <th rowspan="2" class="text-center align-middle">Tinggi Pulse Amplitudo (mm)</th>
                      <th colspan="5" class="text-center align-middle">Pembacaan Pada Standar (mm)</th>
                    </tr>
                    <tr>
                      <th class="text-center align-middle">I</th>
                      <th class="text-center align-middle">II</th>
                      <th class="text-center align-middle">III</th>
                      <th class="text-center align-middle">IV</th>
                      <th class="text-center align-middle">V</th>
                    </tr>
                    @foreach ([5, 10, 20] as $index => $value)
                      <tr>
                        @if ($index == 0)
                          <td class="text-center align-middle" rowspan="3">1</td>
                          <td class="text-center align-middle" rowspan="3">Sentivitas</td>
                        @endif
                        <td class="text-center align-middle">{{ $value }}</td>
                        <td class="text-center align-middle">{{ $value }}</td>
                        @foreach (['G','H','I','J','K'] as $letter)
                          <td class="text-center align-middle">
                            <input name="{{ $letter.($index + 40) }}" type="text" class="form-control text-center align-middle">
                          </td>
                        @endforeach
                      </tr>
                    @endforeach
                  </table>
                </div>

                <div class="form-group mt-3">
                  <label><b>Kalibrasi Laju Rekaman</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th rowspan="2" class="text-center align-middle">Parameter</th>
                      <th rowspan="2" class="text-center align-middle">Setting Standar</th>
                      <th rowspan="2" class="text-center align-middle">Setting Alat</th>
                      <th colspan="3" class="text-center align-middle">
                        Pembacaan Pada Standar (mm)
                      </th>
                    </tr>
                    <tr>
                      <th class="text-center align-middle">I</th>
                      <th class="text-center align-middle">II</th>
                      <th class="text-center align-middle">III</th>
                    </tr>
                    @foreach ([47, 51] as $index => $value)
                      <tr>
                        @if ($index == 0)
                          <td class="text-center align-middle" rowspan="2">
                            Laju Rekaman
                          </td>
                          <td class="text-center align-middle" rowspan="2">
                            120 BPM,<br>
                            2 mV
                          </td>
                        @endif
                        <td class="text-center align-middle">{{ ($index + 1) * 25 }}</td>
                        @foreach (['F','G','H'] as $letter)
                          <td class="text-center align-middle">
                            <input name="{{ $letter.$value }}" type="text" class="form-control text-center align-middle">
                          </td>
                        @endforeach
                      </tr>
                    @endforeach
                  </table>
                </div>

                <div class="form-group mt-3">
                  <label><b>Kalibrasi Sinyal</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th class="text-center align-middle" rowspan="2">
                        No
                      </th>
                      <th class="text-center align-middle" rowspan="2">
                        Parameter
                      </th>
                      <th class="text-center align-middle" rowspan="2">
                        Setting Standar<br>(mm/mV)
                      </th>
                      <th class="text-center align-middle" rowspan="2">
                        Setting Alat<br>(mm/mV)
                      </th>
                      <th class="text-center align-middle" rowspan="2">
                        Tinggi Pulsa Input Amplitudo (mm)
                      </th>
                      <th class="text-center align-middle" colspan="5">
                        Pembacaan Pada Standar (mm)
                      </th>
                    </tr>
                    <tr>
                      <th class="text-center align-middle">I</th>
                      <th class="text-center align-middle">II</th>
                      <th class="text-center align-middle">III</th>
                      <th class="text-center align-middle">IV</th>
                      <th class="text-center align-middle">V</th>
                    </tr>
                    <?php 
                      $settingStandar = [
                        'Sine Wave, 10 Hz, 1mV',
                        '60 BPM, 2mV'
                      ];
                      
                      $toolSetting = [20, 10];
                      $rowPosition = [56, 61];
                    ?>
                    @foreach (['Sinyal Sinusoida', 'Sinyal ECG Normal'] as $index => $param)
                      <tr>
                        <td class="text-center align-middle">{{ $index + 1 }}</td>
                        <td class="text-center align-middle">
                          {{ $param }}
                        </td>
                        <td class="text-center align-middle">
                          {{ $settingStandar[$index] }}
                        </td>
                        <td class="text-center align-middle">
                          {{ $toolSetting[$index] }}
                        </td>
                        @if ($index == 0)
                          <td class="text-center align-middle" rowspan="2">20</td>
                        @endif
                        @foreach (['H','I','J','K','L'] as $letter)
                          <td class="text-center align-middle">
                            <input name="{{ $letter.$rowPosition[$index] }}" type="text" class="form-control text-center align-middle">
                          </td>
                        @endforeach
                      </tr>
                    @endforeach
                  </table>
                </div>

                <div class="form-group mt-3 mb-0 row">
                  @foreach ($measuringInstruments as $index => $group)
                      <div class="form-group col">
                        <label><b>{{ 'Alat Ukur '. $group['name'] }}</b></label>
                        <select name="{{ 'B'.(72 + $index) }}" class="form-control">
                          <option disabled selected hidden>Pilih Alat Ukur</option>
                          @foreach ($group['instruments'] as $instrument)
                            <option value="{{$instrument}}">{{$instrument}}</option>
                          @endforeach
                        </select>
                      </div>
                    @endforeach
                </div>
                
                <div class="form-group">
                  <label><b>Petugas Kalibrasi</b></label>
                  <select name="B82" class="form-control">
                    @foreach ($officers as $officer)
                      <option value="{{ $officer }}" @if ($officer == Auth::guard('admin')->user()->name) selected @endif>
                        {{$officer}}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary px-3">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection