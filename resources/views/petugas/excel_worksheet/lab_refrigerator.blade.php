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
                      <input name="C5" type="text" placeholder="Merek" class="form-control">
                      <input name="C6" type="text" placeholder="Tipe/Model" class="form-control mt-2">
                      <input name="C7" type="text" placeholder="Nomor Seri" class="form-control mt-2">
                      <div class="row mt-2 mx-0">
                        <input name="C8" type="text" placeholder="Resolusi" class="form-control col">
                        <div class="col-5 text-center pt-2">
                          <div class="custom-control custom-radio custom-control-inline">
                            <input name="E8" type="radio" value="Analog" id="analog" class="custom-control-input">
                            <label class="custom-control-label" for="analog">Analog</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input name="E8" type="radio" id="digital" value="Digital" class="custom-control-input">
                            <label class="custom-control-label" for="digital">Digital</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col">
                    {{-- Kondisi Ruangan --}}
                    <label><b>Kondisi Ruangan</b></label>
                    <div class="row mx-0">
                      <input name="C17" type="text" placeholder="Suhu Awal" class="form-control col">
                      <input name="D17" type="text" placeholder="Suhu Akhir" class="form-control col ml-3">
                    </div>
                    <div class="row mx-0 mt-2">
                      <input name="C18" type="text" placeholder="Kelembapan Awal" class="form-control col">
                      <input name="D18" type="text" placeholder="Kelembapan Akhir" class="form-control col ml-3">
                    </div>
                    <input name="C19" type="text" placeholder="Tegangan Jala-jala" class="form-control col mt-2">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="form-group col-3">
                    <label><b>Tanggal Penerimaan Alat</b></label>
                    <input name="C9" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tanggal Kalibrasi</b></label>
                    <input name="C10" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tempat Kalibrasi</b></label>
                    <input name="C11" type="text" class="form-control" value="{{ $alkesOrder->external_order->user->fasyenkes_name }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Nama Ruang</b></label>
                    <input name="C12" type="text" class="form-control">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="C22" value="Baik" type="radio" id="C22-a" class="custom-control-input">
                      <label class="custom-control-label" for="C22-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="C22" value="Tidak Baik" type="radio" id="C22-b" class="custom-control-input">
                      <label class="custom-control-label" for="C22-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col-2 mx-0 form-group">
                    <label><b>Fungsi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="C23" value="Baik" type="radio" id="C23-a" class="custom-control-input">
                      <label class="custom-control-label" for="C23-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="C23" value="Tidak Baik" type="radio" id="C23-b" class="custom-control-input">
                      <label class="custom-control-label" for="C23-b">Tidak Baik</label>
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
                        <input name="I27" type="text" class="form-control text-center align-middle">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">2</td>
                      <td class="align-middle">Resistansi Pembumian Protektif</td>
                      <td>
                        <input name="I28" type="text" class="form-control text-center align-middle">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">3</td>
                      <td class="align-middle">
                        <select name="B30" class="form-control">
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas I">
                            Arus bocor peralatan untuk perangkat elektromedik kelas I
                          </option>
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas II">
                            Arus bocor peralatan untuk perangkat elektromedik kelas II
                          </option>
                        </select>
                      </td>
                      <td>
                        <input name="I30" type="text" class="form-control text-center align-middle">
                      </td>
                    </tr>
                  </table>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Pengujian Kinerja</b></label>
                  <div class="row mx-1">
                    <input name="A37" placeholder="Panjang (m)" type="text" class="form-control col">
                    <input name="B37" placeholder="Lebar (m)" type="text" class="form-control col mx-2">
                    <input name="C37" placeholder="Tinggi (m)" type="text" class="form-control col">
                  </div>

                  <div class="mt-4">
                    <img src="{{ asset('img/test_lab_refrigerator_position.JPG') }}" style="width: 300px">
                    <table class="table table-bordered table-md mt-3">
                      <tr>
                        <th class="text-center align-middle" rowspan="2">Posisi Termokopel</th>
                        <th class="text-center align-middle" colspan="10">Penunjukkan Standar</th>
                      </tr>
                      <tr>
                        @for ($i = 1; $i <= 5; $i++)
                          <th class="text-center">t-min {{ $i }}</th>
                          <th class="text-center">t-max {{ $i }}</th>
                        @endfor
                      </tr>
                      @for ($i = 1; $i <= 8; $i++)
                        <tr>
                          <td class="text-center">{{ $i }}</td>
                          @foreach (['C','D','E','F','G','H','I','J','K','L'] as $letter)
                            <td>
                              <input name="{{ $letter.($i + 72) }}" type="text" class="form-control text-center align-middle">
                            </td>
                          @endforeach
                        </tr>
                      @endfor
                      <tr>
                        <td class="text-center">Penunjukkan Indikator</td>
                        <td colspan="5">
                          <input name="C81" type="text" class="form-control text-center align-middle">
                        </td>
                        <td colspan="5">
                          <input name="H81" type="text" class="form-control text-center align-middle">
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>

                <div class="form-group mt-3 mb-0 row">
                  @foreach ($measuringInstruments as $index => $group)
                      <div class="form-group col">
                        <label><b>{{ 'Alat Ukur '. $group['name'] }}</b></label>
                        <select name="{{ 'B'.($index + 112) }}" class="form-control">
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
                  <select name="B118" class="form-control">
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