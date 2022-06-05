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
                      <input name="E15" type="text" placeholder="Suhu Awal" class="form-control col">
                      <input name="F15" type="text" placeholder="Suhu Akhir" class="form-control col ml-3">
                    </div>
                    <div class="row mx-0 mt-2">
                      <input name="E16" type="text" placeholder="Kelembapan Awal" class="form-control col">
                      <input name="F16" type="text" placeholder="Kelembapan Akhir" class="form-control col ml-3">
                    </div>
                    <input name="E17" type="text" placeholder="Tegangan Jala-jala" class="form-control col mt-2">
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
                    <label><b>Kondisi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="C20" value="Baik" type="radio" id="C20-a" class="custom-control-input">
                      <label class="custom-control-label" for="C20-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="C20" value="Tidak Baik" type="radio" id="C20-b" class="custom-control-input">
                      <label class="custom-control-label" for="C20-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col-2 mx-0 form-group">
                    <label><b>Fungsi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="C21" value="Baik" type="radio" id="C21-a" class="custom-control-input">
                      <label class="custom-control-label" for="C21-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="C21" value="Tidak Baik" type="radio" id="C21-b" class="custom-control-input">
                      <label class="custom-control-label" for="C21-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col"></div>
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
                        <input name="K26" type="text" class="form-control text-center align-middle">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">2</td>
                      <td class="align-middle">Resistansi Pembumian Protektif</td>
                      <td>
                        <input name="K27" type="text" class="form-control text-center align-middle">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">3</td>
                      <td class="align-middle">
                        <select name="C28" class="form-control">
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas I">
                            Arus bocor peralatan untuk perangkat elektromedik kelas I
                          </option>
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas II">
                            Arus bocor peralatan untuk perangkat elektromedik kelas II
                          </option>
                        </select>
                      </td>
                      <td>
                        <input name="K28" type="text" class="form-control text-center align-middle">
                      </td>
                    </tr>
                  </table>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Kalibrasi Akurasi Saturasi Oksigen</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th rowspan="2" class="text-center align-middle">No.</th>
                      <th rowspan="2" class="text-center align-middle">Parameter</th>
                      <th rowspan="2" class="text-center align-middle">Setting Pada Standar</th>
                      <th colspan="6" class="text-center align-middle">Pembacaan Alat</th>
                    </tr>
                    <tr>
                      <th class="text-center">I</th>
                      <th class="text-center">II</th>
                      <th class="text-center">III</th>
                      <th class="text-center">IV</th>
                      <th class="text-center">V</th>
                      <th class="text-center">VI</th>
                    </tr>
                    @foreach ([100, 99, 98, 97, 95, 90, 85] as $index => $standar)
                      <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        @if ($index == 0)
                          <td class="text-center align-middle" rowspan="7">Saturasi O₂ (%)</td>
                        @endif
                        <td class="text-center">{{ $standar }}</td>
                        @foreach (['E','F','G','H','I','J'] as $letter)
                          <td>
                            <input name="{{ $letter.($index + 34) }}" type="text" class="form-control text-center">
                          </td>
                        @endforeach
                      </tr>
                    @endforeach
                  </table>
                </div>

                <div class="form-group mt-3">
                  <label><b>Kalibrasi Akurasi Heart Rate</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th rowspan="2" class="text-center align-middle">No.</th>
                      <th rowspan="2" class="text-center align-middle">Parameter</th>
                      <th rowspan="2" class="text-center align-middle">Setting Pada Standar</th>
                      <th colspan="6" class="text-center align-middle">Pembacaan Alat</th>
                    </tr>
                    <tr>
                      <th class="text-center">I</th>
                      <th class="text-center">II</th>
                      <th class="text-center">III</th>
                      <th class="text-center">IV</th>
                      <th class="text-center">V</th>
                      <th class="text-center">VI</th>
                    </tr>
                    @foreach ([30, 60, 120, 240] as $index => $standar)
                      <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        @if ($index == 0)
                          <td class="text-center align-middle" rowspan="4">Saturasi O₂ (%)</td>
                        @endif
                        <td class="text-center">{{ $standar }}</td>
                        @foreach (['E','F','G','H','I','J'] as $letter)
                          <td>
                            <input name="{{ $letter.($index + 45) }}" type="text" class="form-control text-center">
                          </td>
                        @endforeach
                      </tr>
                    @endforeach
                  </table>
                </div>

                <div class="form-group mt-3">
                  <label><b>Kalibrasi Akurasi Heart Rate</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th rowspan="2" class="text-center align-middle">No.</th>
                      <th rowspan="2" class="text-center align-middle">Parameter</th>
                      <th rowspan="2" class="text-center align-middle">Setting Pada Standar</th>
                      <th colspan="6" class="text-center align-middle">Pembacaan Alat</th>
                    </tr>
                    <tr>
                      <th class="text-center">I</th>
                      <th class="text-center">II</th>
                      <th class="text-center">III</th>
                      <th class="text-center">IV</th>
                      <th class="text-center">V</th>
                      <th class="text-center">VI</th>
                    </tr>
                    @foreach ([30, 60, 120, 240] as $index => $standar)
                      <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        @if ($index == 0)
                          <td class="text-center align-middle" rowspan="4">Saturasi O₂ (%)</td>
                        @endif
                        <td class="text-center">{{ $standar }}</td>
                        @foreach (['E','F','G','H','I','J'] as $letter)
                          <td>
                            <input name="{{ $letter.($index + 45) }}" type="text" class="form-control text-center">
                          </td>
                        @endforeach
                      </tr>
                    @endforeach
                  </table>
                </div>

                <div class="form-group mt-3">
                  <label><b>Keterangan</b></label>
                  <select name="B51" class="form-control">
                    <option value="Ketidakpastian pengukuran diperoleh dari sumber kesalahan tipe A dan tipe B">
                      Ketidakpastian pengukuran diperoleh dari sumber kesalahan tipe A dan tipe B
                    </option>
                    <option value="1. Ketidakpastian pengukuran diperoleh dari sumber ketidakpastian tipe A dan tipe B">
                      1. Ketidakpastian pengukuran diperoleh dari sumber ketidakpastian tipe A dan tipe B
                    </option>
                  </select>
                </div>

                <div class="form-group mt-3 mb-0 row">
                  @foreach ($measuringInstruments as $index => $group)
                      <div class="form-group col">
                        <label><b>{{ 'Alat Ukur '. $group['name'] }}</b></label>
                        <select name="{{ 'B'.($index + 58) }}" class="form-control">
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
                  <select name="B67" class="form-control">
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