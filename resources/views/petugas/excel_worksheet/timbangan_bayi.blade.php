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
                {{ route('petugas.order.external.worksheet.excel.update', ['order_id' => $order_id, 'alkes_order_id' => $alkesOrder->id]) }}
              @else
                {{ route('petugas.order.external.worksheet.excel.store', ['order_id' => $order_id, 'alkes_order_id' => $alkesOrder->id]) }}
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
                    <input type="text" class="form-control" value="{{ $alkesOrder->external_order->number }}" name="order_number" readonly>
                  </div>
                </div>
  
                <div class="mt-3">
                  <div class="row">
                    <div class="form-group col-2">
                      <label><b>Merek Alat</b></label>
                      <input name="D4" type="text" placeholder="Merek" class="form-control" value="{{ $excel_value['D4'] ?? '' }}">
                    </div>
                    <div class="form-group col-2">
                      <label><b>Tipe/Model Alat</b></label>
                      <input name="D5" type="text" placeholder="Tipe/Model" class="form-control" value="{{ $excel_value['D5'] ?? '' }}">
                    </div>
                    <div class="form-group col-2">
                      <label><b>Nomor Seri Alat</b></label>
                      <input name="D6" type="text" placeholder="Tipe/Model" class="form-control" value="{{ $excel_value['D6'] ?? '' }}">
                    </div>
                    <div class="form-group col">
                      <label><b>Resolusi Alat</b></label>
                      <div class="row mx-0">
                        <input name="D7" type="text" placeholder="Resolusi" class="form-control col" value="{{ $excel_value['D7'] ?? '' }}">
                        <div class="col-5 text-center pt-2">
                          <div class="custom-control custom-radio custom-control-inline">
                            <input name="F7" type="radio" value="Analog" id="analog" class="custom-control-input"
                            @if (isset($excel_value['F7']))
                              @if ($excel_value['F7'] == 'Analog') checked @endif
                            @endif>
                            <label class="custom-control-label" for="analog">Analog</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input name="F8" type="radio" id="digital" value="Digital" class="custom-control-input"
                            @if (isset($excel_value['F7']))
                              @if ($excel_value['F7'] == 'Digital') checked @endif
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
                      <input name="D8" type="date" class="form-control" value="{{ $excel_value['D8'] ?? date('Y-m-d', time()) }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Tanggal Kalibrasi</b></label>
                      <input name="D9" type="date" class="form-control" value="{{ $excel_value['D9'] ?? date('Y-m-d', time()) }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Tempat Kalibrasi</b></label>
                      <input name="D10" type="text" class="form-control" value="{{ $excel_value['D10'] ?? $alkesOrder->external_order->user->fasyenkes_name }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Nama Ruang</b></label>
                      <input name="D11" type="text" class="form-control" value="{{ $excel_value['D11'] ?? '' }}">
                    </div>
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="form-group col">
                    <label><b>Suhu Awal</b></label>
                    <input name="D16" type="text" placeholder="Suhu Awal" class="form-control col" value="{{ $excel_value['D16'] ?? '' }}">
                  </div>
                  <div class="form-group col">
                    <label><b>Suhu Akhir</b></label>
                    <input name="E16" type="text" placeholder="Suhu Akhir" class="form-control col" value="{{ $excel_value['E16'] ?? '' }}">
                  </div>
                  <div class="form-group col">
                    <label><b>Kelembapan Awal</b></label>
                    <input name="D17" type="text" placeholder="Kelembapan Awal" class="form-control col" value="{{ $excel_value['D17'] ?? '' }}">
                  </div>
                  <div class="form-group col">
                    <label><b>Kelembapan Akhir</b></label>
                    <input name="E17" type="text" placeholder="Kelembapan Akhir" class="form-control col" value="{{ $excel_value['E17'] ?? '' }}">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="D21" value="Baik" type="radio" id="E21-a" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['D21'] == "Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="E21-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="D21" value="Tidak Baik" type="radio" id="E21-b" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['D21'] == "Tidak Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="E21-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col-2 mx-0 form-group">
                    <label><b>Fungsi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="D22" value="Baik" type="radio" id="D22-a" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['D22'] == "Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="D22-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="D22" value="Tidak Baik" type="radio" id="D22-b" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['D22'] == "Tidak Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="D22-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col"></div>
                </div>
  
                <div class="mt-3 form-group">
                  <label><b>Daya Ulang Pembacaan</b></label>
                    <table class="table table-bordered table-md">
                      <tr>
                        <td rowspan="2" class="text-center align-middle" style="width: 100px">
                          Reading No.
                        </td>
                        <td class="text-center align-middle" colspan="2">
                          Load : 5 kg
                        </td>
                        <td class="text-center align-middle" colspan="2">
                          Load : 10 kg
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center">z1 (kg)</td>
                        <td class="text-center">m1 (kg)</td>
                        <td class="text-center">z1 (kg)</td>
                        <td class="text-center">m1 (kg)</td>
                      </tr>
                      @for ($i = 1; $i <= 10; $i++)
                        <tr>
                          <td class="text-center align-middle">{{ $i }}</td>
                          @foreach (['C', 'D', 'F', 'G'] as $letter)
                            <td class="text-center align-middle">
                              <input name="{{ $letter.($i + 29) }}" type="text" class="text-center form-control" value="{{ $excel_value[$letter.($i + 29)] ?? '' }}">
                            </td>
                          @endforeach
                        </tr>
                        @endfor
                    </table>
                </div>

                <div class="mt-3 form-group">
                  <label><b>Penyimpangan Penunjukkan</b></label>
                    <table class="table table-bordered table-md">
                      <tr>
                        <td class="text-center align-middle">Mass (kg)</td>
                        <td class="text-center align-middle">z1</td>
                        <td class="text-center align-middle">m1</td>
                        <td class="text-center align-middle">m2</td>
                        <td class="text-center align-middle">z2</td>
                      </tr>
                      <?php $numCol = [44, 45, 46, 48, 53] ?>
                      @foreach ([1, 2, 3, 5, 10] as $index => $mass)
                        <tr>
                          <td class="text-center align-middle">{{ $mass }}</td>
                          @foreach (['C', 'D', 'E', 'F'] as $letter)
                            <td class="text-center align-middle">
                              <input name="{{ $letter.$numCol[$index] }}" type="text" class="form-control text-center" value="{{ $excel_value[$letter.$numCol[$index]] ?? '' }}">
                            </td>
                          @endforeach
                        </tr>
                      @endforeach
                    </table>
                </div>

                <div class="mt-3 form-group">
                  <label class="mt-5"><b>Efek Pembebanan Tidak di Pusat Pan</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th class="text-center">Position</th>
                      @for ($i = 0; $i <= 4; $i++)
                        <th class="text-center">{{ $i }}</th>
                      @endfor
                    </tr>
                    @for ($i = 1; $i <= 2; $i++)
                      <tr>
                        <th class="text-center align-middle" style="width: 150px">Indication {{ $i }}</th>
                        @foreach (['C', 'D', 'E', 'F', 'G'] as $letter)
                          <td class="text-center align-middle">
                            <input name="{{ $letter.($i + 56) }}" type="text" class="form-control text-center" value="{{ $excel_value[$letter.($i + 56)] ?? '' }}">
                          </td>
                        @endforeach
                      </tr>
                    @endfor
                  </table>
                </div>

                <?php $num_pos = [68, 72] ?>
                <div class="form-group mt-3 mb-0 row">
                  @foreach ($measuringInstruments as $index => $group)
                      <div class="form-group col">
                        <label>
                          <b>
                            {{ 'Alat Ukur '. $group['name'] }}
                          </b>
                        </label>
                        <select name="{{ 'B'.$num_pos[$index] }}" class="form-control">
                          <option disabled selected hidden>Pilih Alat Ukur</option>
                          @foreach ($group['instruments'] as $instrument)
                            <option value="{{$instrument}}"
                              @if (isset($excel_value))
                                @if($excel_value['B'.$num_pos[$index]] == $instrument) selected @endif
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