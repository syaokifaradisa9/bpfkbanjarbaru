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
                      <input name="F4" type="text" placeholder="Merek" class="form-control">
                      <input name="F5" type="text" placeholder="Tipe/Model" class="form-control mt-2">
                      <input name="F6" type="text" placeholder="Nomor Seri" class="form-control mt-2">
                    </div>
                  </div>
                  <div class="form-group col">
                    {{-- Kondisi Ruangan --}}
                    <label><b>Kondisi Ruangan</b></label>
                    <div class="row mx-0">
                      <input name="F14" type="text" placeholder="Suhu Awal" class="form-control col">
                      <input name="G14" type="text" placeholder="Suhu Akhir" class="form-control col ml-3">
                    </div>
                    <div class="row mx-0 mt-2">
                      <input name="F15" type="text" placeholder="Kelembapan Awal" class="form-control col">
                      <input name="G15" type="text" placeholder="Kelembapan Akhir" class="form-control col ml-3">
                    </div>
                    <input name="F16" type="text" placeholder="Tegangan Jala-jala" class="form-control col mt-2">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="form-group col-3">
                    <label><b>Tanggal Penerimaan Alat</b></label>
                    <input name="F7" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tanggal Kalibrasi</b></label>
                    <input name="F8" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tempat Kalibrasi</b></label>
                    <input name="F9" type="text" class="form-control" value="{{ $alkesOrder->external_order->user->fasyenkes_name }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Nama Ruang</b></label>
                    <input name="F10" type="text" class="form-control">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="F19" value="Baik" type="radio" id="F19-a" class="custom-control-input">
                      <label class="custom-control-label" for="F19-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="F19" value="Tidak Baik" type="radio" id="F19-b" class="custom-control-input">
                      <label class="custom-control-label" for="F19-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col-2 mx-0 form-group">
                    <label><b>Fungsi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="F20" value="Baik" type="radio" id="F20-a" class="custom-control-input">
                      <label class="custom-control-label" for="F20-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="F20" value="Tidak Baik" type="radio" id="F20-b" class="custom-control-input">
                      <label class="custom-control-label" for="F20-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col"></div>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Hasil Pengujian Keselamtan Listrik</b></label>
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
                        <input name="J25" type="text" class="form-control">
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
                        <input name="J26" type="text" class="form-control">
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
                        <input name="J27" type="text" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">4</td>
                      <td class="align-middle">Arus bocor peralatan yang diaplikasikan</td>
                      <td class="text-center align-middle">
                        <input name="J28" type="text" class="form-control">
                      </td>
                    </tr>
                  </table>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Kalibrasi Heart Rate</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th class="text-center align-middle" rowspan="2">No.</th>
                      <th class="text-center align-middle" rowspan="2">Parameter</th>
                      <th class="text-center align-middle" rowspan="2">Setting Standar</th>
                      <th class="text-center align-middle" colspan="6">Pembacaan Alat</th>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">I</td>
                      <td class="text-center align-middle">II</td>
                      <td class="text-center align-middle">III</td>
                      <td class="text-center align-middle">IV</td>
                      <td class="text-center align-middle">V</td>
                      <td class="text-center align-middle">VI</td>
                    </tr>
                    @foreach ([30, 60, 120, 180] as $index => $value)
                      <tr>
                        @if ($index == 0)
                          <td rowspan="4" class="text-center align-middle">1</td>
                          <td rowspan="4" class="text-center align-middle">
                            <select name="C35" class="form-control">
                              <option value="Heart Rate (BPM)">
                                Heart Rate (BPM)
                              </option>
                              <option value="Pulse Rate (BPM)">
                                Pulse Rate (BPM)
                              </option>
                            </select>
                          </td>
                        @endif
                        <td class="text-center align-middle">{{ $value }}</td>
                        @foreach (['E','F','G','H','I','J'] as $letter)
                          <td class="text-center align-middle">
                            <input name="{{ $letter.($index + 35) }}" type="text" class="form-control">
                          </td>
                        @endforeach
                      </tr>
                    @endforeach
                  </table>
                </div>

                <div class="form-group mt-3">
                  <label><b>Kalibrasi Pulse Oximetri</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th class="text-center align-middle" rowspan="2">No.</th>
                      <th class="text-center align-middle" rowspan="2">Parameter</th>
                      <th class="text-center align-middle" rowspan="2">Setting Standar</th>
                      <th class="text-center align-middle" colspan="6">Pembacaan Alat</th>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">I</td>
                      <td class="text-center align-middle">II</td>
                      <td class="text-center align-middle">III</td>
                      <td class="text-center align-middle">IV</td>
                      <td class="text-center align-middle">V</td>
                      <td class="text-center align-middle">VI</td>
                    </tr>
                    @foreach ([90, 95, 98, 99, 100] as $index => $value)
                      <tr>
                        @if ($index == 0)
                          <td rowspan="5" class="text-center align-middle">1</td>
                          <td rowspan="5" class="text-center align-middle">
                            SPO2 (%)
                          </td>
                        @endif
                        <td class="text-center align-middle">{{ $value }}</td>
                        @foreach (['E','F','G','H','I','J'] as $letter)
                          <td class="text-center align-middle">
                            <input name="{{ $letter.($index + 44) }}" type="text" class="form-control">
                          </td>
                        @endforeach
                      </tr>
                    @endforeach
                  </table>
                </div>

                <div class="form-group mt-3">
                  <label><b>Kalibrasi NIBP (Non Invasive Blood Pressure)</b></label>
                  
                  <select name="D62" class="form-control mt-2">
                    <option value="Dewasa">
                      Dewasa
                    </option>
                    <option value="Anak">
                      Anak
                    </option>
                    <option value="Bayi">
                      Bayi
                    </option>
                  </select>

                  <table class="table table-bordered table-md mt-2">
                    <tr>
                      <th class="text-center align-middle" rowspan="2">No.</th>
                      <th class="text-center align-middle" rowspan="2">Parameter<br>(mmHg)</th>
                      <th class="text-center align-middle" colspan="6">Pembacaan Alat</th>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">I</td>
                      <td class="text-center align-middle">II</td>
                      <td class="text-center align-middle">III</td>
                    </tr>
                    <?php $position = 54; ?>
                    @for ($i = 1; $i <= 4; $i++)
                      @foreach (['Sistole', 'Diastole'] as $param)
                        <tr>
                          @if ($param == "Sistole")
                            <td class="text-center align-middle" rowspan="2">{{ $i }}</td>
                          @endif
                          <td class="align-middle">{{ $param }}</td>
                          @foreach (['E', 'F', 'G'] as $letter)
                            <td class="text-center align-middle">
                              <input value="{{ $letter.$position }}" type="text" class="form-control">
                            </td>
                          @endforeach
                        </tr>
                        <?php $position++; ?>
                      @endforeach
                    @endfor
                  </table>
                </div>

                <div class="form-group mt-3">
                  <label><b>Kalibrasi Respirasi</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th class="text-center align-middle" rowspan="2">No.</th>
                      <th class="text-center align-middle" rowspan="2">Parameter</th>
                      <th class="text-center align-middle" rowspan="2">Setting Standar</th>
                      <th class="text-center align-middle" colspan="6">Pembacaan Alat</th>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">I</td>
                      <td class="text-center align-middle">II</td>
                      <td class="text-center align-middle">III</td>
                      <td class="text-center align-middle">IV</td>
                      <td class="text-center align-middle">V</td>
                      <td class="text-center align-middle">VI</td>
                    </tr>
                    @foreach ([20, 30, 40, 60] as $index => $value)
                      <tr>
                        @if ($index == 0)
                          <td rowspan="4" class="text-center align-middle">1</td>
                          <td rowspan="4" class="text-center align-middle">
                            Respirasi<br>(BrPM)
                          </td>
                        @endif
                        <td class="text-center align-middle">{{ $value }}</td>
                        @foreach (['E','F','G','H','I','J'] as $letter)
                          <td class="text-center align-middle">
                            <input name="{{ $letter.($index + 70) }}" type="text" class="form-control">
                          </td>
                        @endforeach
                      </tr>
                    @endforeach
                  </table>
                </div>

                <div class="form-group mt-3 mb-0 row">
                  @foreach ($measuringInstruments as $index => $group)
                      <div class="form-group col">
                        <label>{{ $group['name'] }}</label>
                        <select name="{{ 'B'.(41 + $index) }}" class="form-control">
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
                  <select name="B49" class="form-control">
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