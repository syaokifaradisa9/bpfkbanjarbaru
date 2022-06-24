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
            <form action="
              @if (isset(explode('/', Route::getFacadeRoot()->current()->uri())[6]))
                {{ route('petugas.order.'. $order_type .'.worksheet.excel.update', ['order_id' => $order_id, 'alkes_order_id' => $alkesOrder->id]) }}
              @else
                {{ route('petugas.order.'. $order_type .'.worksheet.excel.store', ['order_id' => $order_id, 'alkes_order_id' => $alkesOrder->id]) }}
              @endif" 
              method="post">
              
              @csrf
              @if (isset(explode('/', Route::getFacadeRoot()->current()->uri())[6]))
                @method('PUT')
              @endif" 

              <div class="card-body px-4">
                <div class="row">
                  <div class="form-group col-2">
                    <label><b>Nomor Sertifikat</b></label>
                    <input type="number" class="form-control" value="{{ $certificate_number }}" name="certificate_number">
                  </div>
                  <div class="form-group col-2">
                    <label><b>Bulan Sertifikat</b></label>
                    <input type="month" class="form-control" name="certificate_date" value="{{ date('Y-m', strtotime($certificate_month ?? now())) }}">
                  </div>
                  <div class="form-group ml-3">
                    <label><b>Nomor Order</b></label>
                    <input type="text" class="form-control" value="{{ $alkesOrder->external_order->number ?? $alkesOrder->internal_order->number }}" name="order_number" readonly>
                  </div>
                </div>
  
                <div class="mt-3">
                  <div class="row">
                    <div class="form-group col-2">
                      <label><b>Merek Alat</b></label>
                      <input name="C5" type="text" placeholder="Merek" class="form-control" value="{{ $excel_value['C5'] ?? $alkesOrder->merk ?? '' }}">
                    </div>
                    <div class="form-group col-2">
                      <label><b>Tipe/Model Alat</b></label>
                      <input name="C6" type="text" placeholder="Tipe/Model" class="form-control" value="{{ $excel_value['C6'] ?? $alkesOrder->model ?? '' }}">
                    </div>
                    <div class="form-group col-2">
                      <label><b>Nomor Seri Alat</b></label>
                      <input name="C7" type="text" placeholder="Tipe/Model" class="form-control" value="{{ $excel_value['C7'] ?? $alkesOrder->series_number ?? '' }}">
                    </div>
                    <div class="form-group col">
                      <label><b>Resolusi Alat</b></label>
                      <div class="row mx-0">
                        <input name="C8" type="text" placeholder="Resolusi" class="form-control col" value="{{ $excel_value['C8'] ?? '' }}">
                        <div class="col-5 text-center pt-2">
                          <div class="custom-control custom-radio custom-control-inline">
                            <input name="E8" type="radio" value="Analog" id="analog" class="custom-control-input"
                            @if (isset($excel_value['E8']))
                              @if ($excel_value['E8'] == 'Analog') checked @endif
                            @endif>
                            <label class="custom-control-label" for="analog">Analog</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input name="E8" type="radio" id="digital" value="Digital" class="custom-control-input"
                            @if (isset($excel_value['E8']))
                              @if ($excel_value['E8'] == 'Digital') checked @endif
                            @endif>
                            <label class="custom-control-label" for="digital">Digital</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-3">
                      <label><b>Tanggal Penerimaan Alat</b></label>
                      <input name="C9" type="date" class="form-control" value="{{ $excel_value['C9'] ?? date('Y-m-d', time()) }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Tanggal Kalibrasi</b></label>
                      <input name="C10" type="date" class="form-control" value="{{ $excel_value['C10'] ?? date('Y-m-d', time()) }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Tempat Kalibrasi</b></label>
                      <input name="C11" type="text" class="form-control" value="{{ $excel_value['C11'] ?? $alkesOrder->external_order->user->fasyankes_name ?? 'Lab LPFK Banjarbaru' }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Nama Ruang</b></label>
                      <input name="C12" type="text" class="form-control" value="{{ $excel_value['C12'] ?? '' }}">
                    </div>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="form-group col">
                    <label><b>Suhu Awal</b></label>
                    <input name="C17" type="text" placeholder="Suhu Awal" class="form-control" value="{{ $excel_value['C17'] ?? '' }}">
                  </div>
                  <div class="form-group col">
                    <label><b>Suhu Akhir</b></label>
                    <input name="D17" type="text" placeholder="Suhu Akhir" class="form-control" value="{{ $excel_value['D17'] ?? '' }}">
                  </div>
                  <div class="form-group col">
                    <label><b>Kelembapan Awal</b></label>
                    <input name="C18" type="text" placeholder="Kelembapan Awal" class="form-control" value="{{ $excel_value['C18'] ?? '' }}">
                  </div>
                  <div class="form-group col">
                    <label><b>Kelembapan Akhir</b></label>
                    <input name="D18" type="text" placeholder="Kelembapan Akhir" class="form-control" value="{{ $excel_value['D18'] ?? '' }}">
                  </div>
                  <div class="form-group col">
                    <label><b>Tegangan Jala-jala</b></label>
                    <input name="C19" type="text" placeholder="Kelembapan Akhir" class="form-control" value="{{ $excel_value['C19'] ?? '' }}">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="C22" value="Baik" type="radio" id="C22-a" class="custom-control-input"
                        @if (isset($excel_value['C22']))
                          @if ($excel_value['C22'] == 'Baik') checked @endif
                        @endif>
                      <label class="custom-control-label" for="C22-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="C22" value="Tidak Baik" type="radio" id="C22-b" class="custom-control-input"
                        @if (isset($excel_value['C22']))
                          @if ($excel_value['C22'] == 'Tidak Baik') checked @endif
                        @endif>
                      <label class="custom-control-label" for="C22-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col-2 mx-0 form-group">
                    <label><b>Fungsi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="C23" value="Baik" type="radio" id="C23-a" class="custom-control-input"
                        @if (isset($excel_value['C23']))
                          @if ($excel_value['C23'] == 'Baik') checked @endif
                        @endif>
                      <label class="custom-control-label" for="C23-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="C23" value="Tidak Baik" type="radio" id="C23-b" class="custom-control-input"
                        @if (isset($excel_value['C23']))
                          @if ($excel_value['C23'] == 'Tidak Baik') checked @endif
                        @endif>
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
                        <input name="I27" type="text" class="form-control text-center align-middle" value="{{ $excel_value['I27'] ?? '' }}">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">2</td>
                      <td class="align-middle">Resistansi Pembumian Protektif</td>
                      <td>
                        <input name="I28" type="text" class="form-control text-center align-middle" value="{{ $excel_value['I28'] ?? ''}}">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">3</td>
                      <td class="align-middle">
                        <select name="B30" class="form-control">
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas I"
                            @if (isset($excel_value['B30']))
                              @if ($excel_value['B30'] == 'Arus bocor peralatan untuk perangkat elektromedik kelas I') selected @endif
                            @endif>
                            Arus bocor peralatan untuk perangkat elektromedik kelas I
                          </option>
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas II"
                            @if (isset($excel_value['B30']))
                              @if ($excel_value['B30'] == 'Arus bocor peralatan untuk perangkat elektromedik kelas II') selected @endif
                            @endif>
                            Arus bocor peralatan untuk perangkat elektromedik kelas II
                          </option>
                        </select>
                      </td>
                      <td>
                        <input name="I30" type="text" class="form-control text-center align-middle" value="{{ $excel_value['I30'] ?? ''}}">
                      </td>
                    </tr>
                  </table>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Pengujian Kinerja</b></label>
                  <div class="mt-4">
                    <img src="{{ asset('img/test_lab_refrigerator_position.JPG') }}" style="width: 300px">
                    <div class="row mt-3">
                      <div class="form-group col">
                        <label><b>Panjang</b></label>
                        <input name="A37" placeholder="Panjang (m)" type="text" class="form-control col" value="{{ $excel_value['A37'] ?? '' }}">
                      </div>
                      <div class="form-group col">
                        <label><b>lebar</b></label>
                        <input name="B37" placeholder="Lebar (m)" type="text" class="form-control col mx-2" value="{{ $excel_value['B37'] ?? '' }}">
                      </div>
                      <div class="form-group col">
                        <label><b>Tinggi</b></label>
                        <input name="C37" placeholder="Tinggi (m)" type="text" class="form-control col" value="{{ $excel_value['C37'] ?? '' }}">
                      </div>
                    </div>
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
                              <input name="{{ $letter.($i + 72) }}" type="text" class="form-control text-center align-middle" value="{{ $excel_value[$letter.($i + 72)] ?? ''}}">
                            </td>
                          @endforeach
                        </tr>
                      @endfor
                      <tr>
                        <td class="text-center">Penunjukkan Indikator</td>
                        <td colspan="5">
                          <input name="C81" type="text" class="form-control text-center align-middle" value="{{ $excel_value['C81'] ?? ''}}">
                        </td>
                        <td colspan="5">
                          <input name="H81" type="text" class="form-control text-center align-middle" value="{{ $excel_value['H81'] ?? '' }}">
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>

                <div class="form-group mt-3 mb-0 row">
                  @foreach ($measuringInstruments as $index => $group)
                      <div class="form-group col">
                        <label><b>{{ 'Alat Ukur '. $group['name'] }}</b></label>
                        <select name="{{ 'A'.($index + 112) }}" class="form-control">
                          <option disabled selected hidden>Pilih Alat Ukur</option>
                          @foreach ($group['instruments'] as $instrument)
                            <option value="{{$instrument}}"
                              @if (isset($excel_value['A'.($index + 112)]))
                                @if ($excel_value['A'.($index + 112)] == $instrument) selected @endif
                              @endif>
                              {{$instrument}}
                            </option>
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
                <button type="submit" class="btn btn-primary px-3">
                  <i class="fas fa-save mr-1"></i>
                  Simpan
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection