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
                      <div class="row mt-2 mx-0">
                        <input name="E14" type="text" placeholder="Resolusi Alat" class="form-control col">
                        <div class="col-5 text-center pt-2">mmHg (sistole; diastole)</div>
                      </div>
                      <div class="row mt-2 mx-0">
                        <input name="J14" type="text" placeholder="Resolusi Alat" class="form-control col">
                        <div class="col-5 text-center pt-2">BPM (Heart Rate)</div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col">
                    <label><b>Kondisi Ruangan</b></label>
                    <div class="row mx-0">
                      <input name="D33" type="text" placeholder="Suhu Awal" class="form-control col">
                      <input name="F33" type="text" placeholder="Suhu Akhir" class="form-control col ml-3">
                    </div>
                    <div class="row mx-0 mt-2">
                      <input name="D34" type="text" placeholder="Kelembapan Awal" class="form-control col">
                      <input name="F34" type="text" placeholder="Kelembapan Akhir" class="form-control col ml-3">
                    </div>
                    <input name="D35" type="text" placeholder="Tegangan Jala-jala" class="form-control col mt-2">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="form-group col-3">
                    <label><b>Tanggal Penerimaan Alat</b></label>
                    <input name="E7" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tanggal Kalibrasi</b></label>
                    <input name="E8" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tempat Kalibrasi</b></label>
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
                      <input name="D37" value="Baik" type="radio" id="D37-a" class="custom-control-input">
                      <label class="custom-control-label" for="D37-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="D37" value="Tidak Baik" type="radio" id="D37-b" class="custom-control-input">
                      <label class="custom-control-label" for="D37-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Fungsi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="D38" value="Baik" type="radio" id="D38-a" class="custom-control-input">
                      <label class="custom-control-label" for="D38-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="D38" value="Tidak Baik" type="radio" id="D38-b" class="custom-control-input">
                      <label class="custom-control-label" for="D38-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col form-group">
                    <label><b>Klasifikasi</b></label>
                    <div class="custom-control custom-radio">
                      <input name="E16" value="Bayi" type="radio" id="E16-a" class="custom-control-input">
                      <label class="custom-control-label" for="E16-a">Bayi</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="E16" value="Anak" type="radio" id="E16-b" class="custom-control-input">
                      <label class="custom-control-label" for="E16-b">Anak</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="E16" value="Dewasa" type="radio" id="E16-c" class="custom-control-input">
                      <label class="custom-control-label" for="E16-c">Dewasa</label>
                    </div>
                  </div>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Pengujian Keselamatan Listrik</b></label>
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
                        <input name="G42" type="text" class="form-control text-center align-middle">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">3</td>
                      <td class="align-middle">
                        <select name="A43" class="form-control">
                          <option value="Resistansi pembumian protektif (kabel dapat dilepas)">
                            Resistansi pembumian protektif (kabel dapat dilepas)
                          </option>
                          <option value="Resistansi pembumian protektif (kabel tidak dapat dilepas)">
                            Resistansi pembumian protektif (kabel tidak dapat dilepas)
                          </option>
                        </select>
                      </td>
                      <td>
                        <input name="G43" type="text" class="form-control text-center align-middle">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">3</td>
                      <td class="align-middle">
                        <select name="A44" class="form-control">
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas I">
                            Arus bocor peralatan untuk perangkat elektromedik kelas I
                          </option>
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas II">
                            Arus bocor peralatan untuk perangkat elektromedik kelas II
                          </option>
                        </select>
                      </td>
                      <td>
                        <input name="G44" type="text" class="form-control text-center align-middle">
                      </td>
                    </tr>
                  </table>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Pengujian Kinerja Blood Pressure Monitor</b></label>
                  <table class="table table-bordered table-md">
                      <tr>
                          <th rowspan="3" class="text-center align-middle">No</th>
                          <th rowspan="3" class="text-center align-middle">Parameter</th>
                          <th rowspan="3" class="text-center align-middle" style="width: 100px">Setting Standar (mmHg)</th>
                          <th rowspan="3" class="text-center align-middle">Setting Heart Rate (bpm)</th>
                          <th colspan="5" class="text-center align-middle">Penunjukan Alat (mmHg)</th>
                      </tr>
                      <tr>
                          @for ($i = 0; $i < 5; $i++)
                              <th class="text-center align-middle" style="width: 130px">Terbaca</th>
                          @endfor
                      </tr>
                      <tr>
                          @for ($i = 0; $i < 5; $i++)
                              <th class="text-center align-middle">{{ $i }}</th>
                          @endfor
                      </tr>
                      <?php 
                          $sistoleStandard = [80, 100, 120, 150];
                          $diastoleStandard = [50, 65, 80, 100];    
                          $sistoleRowPosition = [51, 54, 57, 60];
                          $diastoleRowPosition = [52, 55, 58, 61];
                      ?>
                      @for ($i = 0; $i < 4; $i++)
                          <tr>
                              <td rowspan="2" class="align-middle">{{ $i+1 }}</td>
                              <td class="align-middle">Sistole</td>
                              <td class="align-middle text-center">{{ $sistoleStandard[$i] }}</td>
                              <td rowspan="2" class="text-center align-middle">
                                  <select class="form-control ml-2" name="E{{ $sistoleRowPosition[$i] }}">
                                      <option value="" disabled selected hidden>Nilai BPM</option>
                                      <option value="60">60</option>
                                      <option value="70">70</option>
                                      <option value="80">80</option>
                                      <option value="120">120</option>
                                  </select>
                              </td>
                              @foreach (range('F', 'J') as $letter)
                                  <td class="text-center align-middle">
                                    <input type="text" class="text-center align-middle form-control" name="{{ $letter.$sistoleRowPosition[$i] }}">
                                  </td>
                              @endforeach
                          </tr>
                          <tr>
                              <td class="align-middle">Diastole</td>
                              <td class="align-middle text-center">{{ $diastoleStandard[$i] }}</td>
                              @foreach (range('F', 'J') as $letter)
                                  <td class="text-center align-middle">
                                    <input type="text" class="text-center align-middle form-control" name="{{ $letter.$diastoleRowPosition[$i] }}">
                                  </td>
                              @endforeach
                          </tr>
                      @endfor

                      <tr>
                          <td rowspan="2" class="align-middle">5</td>
                          <td class="row">
                              <div class="col mt-4">
                                Sistole
                              </div>
                              <div class="col">
                                <div class="custom-control custom-radio">
                                  <input name="C63" value="200" type="radio" id="C63-a" class="custom-control-input">
                                  <label class="custom-control-label" for="C63-a">200</label>
                                </div>
                                <div class="custom-control custom-radio">
                                  <input name="C63" value="170" type="radio" id="C63-b" class="custom-control-input">
                                  <label class="custom-control-label" for="C63-b">170</label>
                                </div>
                                <div class="custom-control custom-radio">
                                  <input name="C63" value="160" type="radio" id="C63-c" class="custom-control-input">
                                  <label class="custom-control-label" for="C63-c">160</label>
                                </div>
                              </div>
                          </td>
                          <td class="align-middle text-center">200</td>
                          <td rowspan="2" class="text-center align-middle">
                              <select class="form-control ml-2" name="E63">
                                  <option value="" disabled selected hidden>Nilai BPM</option>
                                  <option value="60">60</option>
                                  <option value="70">70</option>
                                  <option value="80">80</option>
                                  <option value="120">120</option>
                              </select>
                          </td>
                          @foreach (range('F', 'J') as $letter)
                              <td class="text-center align-middle"><input type="text" class="text-center align-middle form-control" name="{{ $letter."63" }}"></td>
                          @endforeach
                      </tr>
                      <tr>
                          <td class="align-middle">Diastole</td>
                          <td class="align-middle text-center">150</td>
                          @foreach (range('F', 'J') as $letter)
                              <td class="text-center align-middle"><input type="text" class="text-center align-middle form-control" name="{{ $letter."64" }}"></td>
                          @endforeach
                      </tr>
                  </table>
                </div>

                <div class="form-group mt-3">
                  <label><b>Pengujian Kinerja Heart Rate</b></label>
                  <table class="table table-bordered table-md">
                      <tr>
                          <th rowspan="3" class="text-center align-middle">No</th>
                          <th rowspan="3" class="text-center align-middle">Parameter</th>
                          <th rowspan="3" class="text-center align-middle">Setting Standar (BPM)</th>
                          <th rowspan="3" class="text-center align-middle">Setting Sistole (mmHg)</th>
                          <th rowspan="3" class="text-center align-middle">Setting Diastole (mmHg)</th>
                          <th colspan="3" class="text-center align-middle">Penunjukan Alat (BPM)</th>
                      </tr>
                      <tr>
                          @for ($i = 0; $i < 3; $i++)
                              <th class="text-center align-middle">Terbaca</th>
                          @endfor
                      </tr>
                      <tr>
                          @for ($i = 1; $i <= 3; $i++)
                              <th class="text-center align-middle">{{ $i }}</th>
                          @endfor
                      </tr>
                      <tr>
                          <td rowspan="3" class="text-center align-middle">1</td>
                          <td rowspan="3" class="text-center align-middle">Heart Rate</td>
                          <td class="text-center align-middle"><input type="text" class="text-center align-middle form-control" name="D73"></td>
                          <td rowspan="3" class="text-center align-middle">120</td>
                          <td rowspan="3" class="text-center align-middle">80</td>
                          <td class="text-center align-middle"><input type="text" class="text-center align-middle form-control" name="G73"></td>
                          <td class="text-center align-middle"><input type="text" class="text-center align-middle form-control" name="H73"></td>
                          <td class="text-center align-middle"><input type="text" class="text-center align-middle form-control" name="I73"></td>
                      </tr>
                      @for ($i = 0; $i < 2; $i++)
                          <tr>
                              @foreach (['D','G','H','I'] as $letter)
                                  <td class="text-center align-middle">
                                    <input type="text" class="text-center align-middle form-control" value="{{ $letter.($i + 74) }}">
                                  </td>
                              @endforeach
                          </tr>    
                      @endfor
                  </table>
                </div>

                <div class="form-group mt-3">
                  <label><b>Keterangan</b></label>
                  <div class="row mx-1">
                    <select name="B85" class="form-control col">
                      <option value="Catu daya menggunakan baterai">
                        Catu daya menggunakan baterai
                      </option>
                      <option value=""></option>
                    </select>
                    <select name="B86" class="form-control col ml-2">
                      <option value="Di sarankan ganti manset">Di sarankan ganti manset</option>
                      <option value=""></option>
                    </select>
                  </div>
                </div>

                <div class="form-group mt-3 mb-0 row">
                  @foreach ($measuringInstruments as $index => $group)
                      <div class="form-group col">
                        <label><b>{{ 'Alat Ukur '. $group['name'] }}</b></label>
                        <select name="{{ 'B'.($index + 88) }}" class="form-control">
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
                  <select name="E15" class="form-control">
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