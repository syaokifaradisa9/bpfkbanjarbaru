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
            <form action="{{ route('petugas.order.external.worksheet.excel.store', ['order_id' => $order_id, 'alkes_order_id' => $alkes_order_id]) }}" method="post">
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
                      <input name="E6" type="text" placeholder="Merek" class="form-control">
                      <input name="E7" type="text" placeholder="Tipe/Model" class="form-control mt-2">
                      <input name="E8" type="text" placeholder="Nomor Seri" class="form-control mt-2">
                      <div class="row mt-2 mx-0">
                        <input name="E9" type="text" placeholder="Resolusi" class="form-control col">
                        <div class="col-5 text-center pt-2">
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" value="( Analog )" id="customRadioInline1" name="G9" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">Analog</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" value="( Digital )" name="G9" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">Digital</label>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <div class="form-group col">
                    {{-- Kondisi Ruangan --}}
                    <label><b>Kondisi Ruangan</b></label>
                    <div class="row mx-0">
                      <input name="E18" type="text" placeholder="Suhu Awal" class="form-control col">
                      <input name="F18" type="text" placeholder="Suhu Akhir" class="form-control col ml-3">
                    </div>
                    <div class="row mx-0 mt-2">
                      <input name="E19" type="text" placeholder="Kelembapan Awal" class="form-control col">
                      <input name="F19" type="text" placeholder="Kelembapan Akhir" class="form-control col ml-3">
                    </div>
                    <input name="E20" type="text" placeholder="Tegangan Jala-jala" class="form-control mt-2">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="form-group col-3">
                    <label><b>Tanggal Penerimaan Alat</b></label>
                    <input name="E10" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tanggal Kalibrasi</b></label>
                    <input name="E11" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tempat Kalibrasi</b></label>
                    <input name="E12" type="text" class="form-control" value="{{ $alkesOrder->external_order->user->fasyenkes_name }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Nama Ruang</b></label>
                    <input name="E13" type="text" class="form-control">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="E23" value="Baik" type="radio" id="E23-a" class="custom-control-input">
                      <label class="custom-control-label" for="E23-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="E23" value="Tidak Baik" type="radio" id="E23-b" class="custom-control-input">
                      <label class="custom-control-label" for="E23-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="E24" value="Baik" type="radio" id="E24-a" class="custom-control-input">
                      <label class="custom-control-label" for="E24-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="E24" value="Tidak Baik" type="radio" id="E24-b" class="custom-control-input">
                      <label class="custom-control-label" for="E24-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col"></div>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Hasil Pengujian Keselamatan Listrik</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th>No</th>
                      <th>Parameter</th>
                      <th>Hasil Ukur</th>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">1</td>
                      <td class="align-middle">Resistansi Isolasi</td>
                      <td>
                        <input name="I28" type="text" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">2</td>
                      <td class="align-middle">
                        <select name="C29" class="form-control">
                          <option value="Resistansi Pembumian Protektif (kabel dapat dilepas)">
                            Resistansi Pembumian Protektif (kabel dapat dilepas)
                          </option>
                          <option value="Resistansi Pembumian Protektif (kabel tidak dapat dilepas)">
                            Resistansi Pembumian Protektif (kabel tidak dapat dilepas)
                          </option>
                        </select>
                      </td>
                      <td>
                        <input name="I29" type="text" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">3</td>
                      <td class="align-middle">
                        <select name="C30" class="form-control">
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas I">
                            Arus bocor peralatan untuk perangkat elektromedik kelas I
                          </option>
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas II">
                            Arus bocor peralatan untuk perangkat elektromedik kelas II
                          </option>
                        </select>
                      </td>
                      <td>
                        <input name="I30" type="text" class="form-control">
                      </td>
                    </tr>
                  </table>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Pengujian Kinerja Kalibrasi Kecepatan</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th rowspan="2" class="text-center align-middle">No</th>
                      <th rowspan="2" class="text-center align-middle">Parameter</th>
                      <th rowspan="2" class="text-center align-middle">Setting Alat</th>
                      <th colspan="6" class="text-center align-middle">Pembacaan Standar</th>
                    </tr>
                    <tr>
                      <th class="text-center">I</th>
                      <th class="text-center">II</th>
                      <th class="text-center">III</th>
                      <th class="text-center">IV</th>
                      <th class="text-center">V</th>
                      <th class="text-center">VI</th>
                    </tr>
                    @for ($i = 0; $i < 4; $i++)
                      <tr>
                        <td>{{ $i + 1 }}</td>
                        @if ($i == 0)
                          <td rowspan="4" class="text-center align-middle">Kecepatan Putaran<br>(RPM)</td>
                        @endif
                        @foreach (['D', 'F', 'G', 'H', 'I', 'J', 'K'] as $letter)
                        <td>
                          <input name="{{ $letter.(36 + $i) }}" type="text" class="form-control">
                        </td>
                        @endforeach
                      </tr>
                    @endfor
                  </table>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Pengujian Akurasi Waktu Putar</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th rowspan="2" class="text-center align-middle">No</th>
                      <th rowspan="2" class="text-center align-middle">Parameter</th>
                      <th rowspan="2" class="text-center align-middle">Setting Alat</th>
                      <th colspan="3" class="text-center align-middle">Pembacaan Standar</th>
                    </tr>
                    <tr>
                      <th class="text-center">I</th>
                      <th class="text-center">II</th>
                      <th class="text-center">III</th>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">5</td>
                      <td class="text-center align-middle">Waktu (s)</td>
                      @foreach (['D', 'F', 'H', 'J'] as $letter)
                        <td>
                          <input name="{{ $letter.'44' }}" type="text" class="form-control">
                        </td>
                      @endforeach
                    </tr>
                  </table>
                </div>
  
                <div class="form-group mt-3 mb-0">
                  <label><b>Alat Ukur yang Digunakan</b></label>
                  <div class="row">
                    @foreach ($measuringInstruments as $index => $group)
                      <div class="form-group col">
                        <label>{{ $group['name'] }}</label>
                        <select name="{{ 'B'.(55 + $index) }}" class="form-control">
                          <option disabled selected hidden>Pilih Alat Ukur</option>
                          @foreach ($group['instruments'] as $instrument)
                            <option value="{{$instrument}}">{{$instrument}}</option>
                          @endforeach
                        </select>
                      </div>
                    @endforeach
                  </div>
                </div>
                
                <div class="form-group">
                  <label><b>Petugas Kalibrasi</b></label>
                  <select name="B65" class="form-control">
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