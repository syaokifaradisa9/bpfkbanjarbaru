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
                    <div class="form-group col-3">
                      <label><b>Merek Alat</b></label>
                      <input name="E4" type="text" placeholder="Merek" class="form-control" value="{{ $excel_value['E4'] ?? '' }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Tipe/Model Alat</b></label>
                      <input name="E5" type="text" placeholder="Tipe/Model" class="form-control" value="{{ $excel_value['E5'] ?? '' }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Nomor Seri Alat</b></label>
                      <input name="E6" type="text" placeholder="Tipe/Model" class="form-control" value="{{ $excel_value['E6'] ?? '' }}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col">
                      <label><b>Nomor Seri Alat</b></label>
                      <div class="ml-1 row">
                        <select name="C7" class="form-control col">
                          <option value="(10 - 50) mL/h"
                            @if (isset($excel_value))
                              @if($excel_value['C7'] == "(10 - 50) mL/h") selected @endif
                            @endif>
                            (10 - 50) mL/h
                          </option>
                          <option value="(0 - 150) mL/h"
                            @if (isset($excel_value))
                              @if($excel_value['C7'] == "(0 - 150) mL/h") selected @endif
                            @endif>
                            (0 - 150) mL/h
                          </option>
                          <option value="(0 - 200) mL/h"
                            @if (isset($excel_value))
                              @if($excel_value['C7'] == "(0 - 200) mL/h") selected @endif
                            @endif>
                            (0 - 200) mL/h
                          </option>
                        </select>
                        <input name="E7" type="text" placeholder="Resolusi" class="form-control col ml-2" value="{{ $excel_value['E7'] ?? '' }}">
                        <div class="col-2 text-left pt-2">ml/h</div>
                      </div>
                    </div>
                    <div class="form-group col">
                      <label><b>Nomor Seri Alat</b></label>
                      <div class="row ml-1">
                        <select name="C8" class="form-control col">
                          <option value="(100 - 200) mL/h"
                            @if (isset($excel_value))
                              @if($excel_value['C8'] == "(100 - 200) mL/h") selected @endif
                            @endif>
                            (100 - 200) mL/h
                          </option>
                          <option value="(100 - 150) mL/h"
                            @if (isset($excel_value))
                              @if($excel_value['C8'] == "(100 - 150) mL/h") selected @endif
                            @endif>
                            (100 - 150) mL/h
                          </option>
                        </select>
                        <input name="E8" type="text" placeholder="Resolusi" class="form-control col ml-2" value="{{ $excel_value['E8'] ?? '' }}">
                        <div class="col-2 text-left pt-2">ml/h</div>
                      </div>
                    </div>
                  </div>
                    
                  <div class="row">
                    <div class="form-group col-3">
                      <label><b>Tanggal Penerimaan Alat</b></label>
                      <input name="E9" type="date" class="form-control" value="{{ $excel_value['E9'] ?? date('Y-m-d', time()) }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Tanggal Kalibrasi</b></label>
                      <input name="E10" type="date" class="form-control" value="{{ $excel_value['E10'] ?? date('Y-m-d', time()) }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Tempat Kalibrasi</b></label>
                      <input name="E11" type="text" class="form-control" value="{{ $excel_value['E11'] ?? $alkesOrder->external_order->user->fasyankes_name }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Nama Ruang</b></label>
                      <input name="E12" type="text" class="form-control" value="{{ $excel_value['E12'] ?? '' }}">
                    </div>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="form-group col">
                    <label><b>Suhu Awal</b></label>
                    <input name="E17" type="text" placeholder="Suhu Awal" class="form-control col" value="{{ $excel_value['E17'] ?? '' }}">
                  </div>
                  <div class="form-group col">
                    <label><b>Suhu Akhir</b></label>
                    <input name="F17" type="text" placeholder="Suhu Akhir" class="form-control col" value="{{ $excel_value['F17'] ?? '' }}">
                  </div>
                  <div class="form-group col">
                    <label><b>Kelembapan Awal</b></label>
                    <input name="E18" type="text" placeholder="Kelembapan Awal" class="form-control col" value="{{ $excel_value['E18'] ?? '' }}">
                  </div>
                  <div class="form-group col">
                    <label><b>Kelembapan Akhir</b></label>
                    <input name="F18" type="text" placeholder="Kelembapan Akhir" class="form-control col" value="{{ $excel_value['F18'] ?? '' }}">
                  </div>
                  <div class="form-group col">
                    <label><b>Tegangan Jala-jala</b></label>
                    <input name="E19" type="text" placeholder="Tegangan Jala-jala" class="form-control col" value="{{ $excel_value['E19'] ?? '' }}">
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="E22" value="Baik" type="radio" id="E22-a" class="custom-control-input"
                        @if (isset($excel_value['E22']))
                          @if($excel_value['E22'] == "Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="E22-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="E22" value="Tidak Baik" type="radio" id="E22-b" class="custom-control-input"
                        @if (isset($excel_value['E22']))
                          @if($excel_value['E22'] == "Tidak Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="E22-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col-2 mx-0 form-group">
                    <label><b>Fungsi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="E23" value="Baik" type="radio" id="E23-a" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['E23'] == "Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="E23-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="E23" value="Tidak Baik" type="radio" id="E23-b" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['E23'] == "Tidak Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="E23-b">Tidak Baik</label>
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
                        <input name="J27" type="text" class="form-control text-center align-middle" value="{{ $excel_value['J27'] ?? '' }}">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">2</td>
                      <td class="align-middle">
                        <select name="C28" class="form-control">
                          <option value="Resistansi Pembumian Protektif (kabel dapat dilepas)"
                            @if (isset($excel_value['C28']))
                              @if($excel_value['C28'] == "Resistansi Pembumian Protektif (kabel dapat dilepas)") selected @endif
                            @endif>
                            Resistansi Pembumian Protektif (kabel dapat dilepas)
                          </option>
                          <option value="Resistansi Pembumian Protektif (kabel tidak dapat dilepas)"
                            @if (isset($excel_value['C28']))
                              @if($excel_value['C28'] == "Resistansi Pembumian Protektif (kabel tidak dapat dilepas)") selected @endif
                            @endif>
                            Resistansi Pembumian Protektif (kabel tidak dapat dilepas)
                          </option>
                        </select>
                      </td>
                      <td>
                        <input name="J28" type="text" class="form-control text-center align-middle" value="{{ $excel_value['J28'] ?? '' }}">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">3</td>
                      <td class="align-middle">
                        <select name="C29" class="form-control">
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas I"
                            @if (isset($excel_value['C29']))
                              @if($excel_value['C29'] == "Arus bocor peralatan untuk perangkat elektromedik kelas I") selected @endif
                            @endif>
                            Arus bocor peralatan untuk perangkat elektromedik kelas I
                          </option>
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas II"
                            @if (isset($excel_value['C29']))
                              @if($excel_value['C29'] == "Arus bocor peralatan untuk perangkat elektromedik kelas II") selected @endif
                            @endif>
                            Arus bocor peralatan untuk perangkat elektromedik kelas II
                          </option>
                        </select>
                      </td>
                      <td>
                        <input name="J29" type="text" class="form-control text-center align-middle" value="{{ $excel_value['J29'] ?? ''}}">
                      </td>
                    </tr>
                  </table>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Hasil Pengukuran Kinerja</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th class="text-center align-middle" rowspan="2">No</th>
                      <th class="text-center align-middle" rowspan="2">Parameter</th>
                      <th class="text-center align-middle" rowspan="2">Setting Alat</th>
                      <th class="text-center align-middle" colspan="6">Pembacaan Standar</th>
                    </tr>
                    <tr>
                      <th class="text-center align-middle">I</th>
                      <th class="text-center align-middle">II</th>
                      <th class="text-center align-middle">III</th>
                      <th class="text-center align-middle">IV</th>
                      <th class="text-center align-middle">V</th>
                      <th class="text-center align-middle">VI</th>
                    </tr>
                    @foreach ([10, 50, 100, 500] as $index => $setting)
                      <tr>
                        <td class="text-center align-middle">{{ $index + 1 }}</td>
                        @if ($index == 0)
                          <th class="text-center align-middle" rowspan="4">
                            Flowmeter (ml/h)
                          </th>
                        @endif
                        <td class="text-center align-middle">{{ $setting }}</td>
                        @foreach (['F','G','H','I','J','K'] as $letter)
                          <td class="text-center align-middle">
                            <input name="{{ $letter.($index + 34) }}" type="text" class="form-control text-center align-middle" value="{{ $excel_value[$letter.($index + 34)] ?? ''}}">
                          </td>
                        @endforeach
                      </tr>
                    @endforeach
                  </table>

                  <table class="table table-bordered table-md mt-2">
                    <tr>
                      <th class="text-center align-middle" rowspan="2">No</th>
                      <th class="text-center align-middle" rowspan="2">Parameter</th>
                      <th class="text-center align-middle" colspan="6">Pembacaan Standar</th>
                    </tr>
                    <tr>
                      <th class="text-center align-middle">I</th>
                      <th class="text-center align-middle">II</th>
                      <th class="text-center align-middle">III</th>
                      <th class="text-center align-middle">IV</th>
                      <th class="text-center align-middle">V</th>
                      <th class="text-center align-middle">VI</th>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">5</td>
                      <td class="text-center align-middle">
                        Occlusion (PSI)
                      </td>
                      @foreach (['F','G','H','I','J','K'] as $letter)
                        <td class="text-center align-middle">
                          <input name="{{ $letter."41" }}" type="text" class="form-control text-center align-middle" value="{{ $excel_value[$letter."41"] ?? '' }}">
                        </td>
                      @endforeach
                    </tr>
                  </table>
                </div>

                <div class="mt-3">
                  <div class="row">
                    <div class="col form-group">
                      <label><b>Keterangan</b></label>
                      <select class="form-control" name="B48">
                        <option value="" disabled selected hidden>Channel</option>
                        <?php 
                            $ida_sn = [
                                "(RGL, SN : 05J-0015)",
                                "(IDA 4, SN : 14813)",
                                "(IDA 5, SN : 3216902)",
                                "(IDA 5, SN : 4429017)",
                                "(IDA 5, SN : 5157004)",
                                "(IDA 5, SN : 5157005)",
                            ];
                        ?>
                        <option value="Infusion device analyzer menggunakan single channel (kosong)"
                          @if (isset($excel_value['B48']))
                            @if($excel_value['B48'] == "Infusion device analyzer menggunakan single channel (kosong)") selected @endif
                          @endif>
                          Single channel (kosong)
                        </option>
                        <option value="Infusion device analyzer menggunakan single channel (1S, SN : 3157903)"
                          @if (isset($excel_value['B48']))
                            @if($excel_value['B48'] == "Infusion device analyzer menggunakan single channel (1S, SN : 3157903)") selected @endif
                          @endif>
                          Single channel (1S, SN : 3157903)
                        </option>
                        @foreach ($ida_sn as $data)
                            @for ($i = 1; $i <= 4; $i++)
                                <option value="Infusion device analyzer menggunakan channel {{ $i. " ". $data }}"
                                  @if (isset($excel_value['B48']))
                                    @if($excel_value['B48'] == "Infusion device analyzer menggunakan channel ". $i . " ". $data . "") selected @endif
                                  @endif>
                                  Channel {{ $i. " ". $data }}
                                </option>
                            @endfor 
                        @endforeach
                      </select>
                    </div>
                    <div class="col form-group">
                      <label><b>merek Syringe</b></label>
                        <select class="form-control" name="D49">
                          <option value="" disabled selected hidden>Pilih Syringe Merk</option>
                          @foreach (['Bbraun', 'Terumo', 'Otsuka', 'Onemed', 'GEA', 'Mindray', 'Fresenius', 'Others'] as $merkName)
                            <option value="{{ $merkName }}"
                              @if (isset($excel_value['D49']))
                                @if($excel_value['D49'] == $merkName) selected @endif
                              @endif>
                              {{ $merkName }}
                            </option>
                          @endforeach
                        </select>
                    </div>
                    <div class="col form-group">
                      <label><b>Merek Extend Tube</b></label>
                        <select class="form-control" name="D50">
                          <option value="" disabled selected hidden>Pilih Extend Tube Merk</option>
                          @foreach (['Bbraun', 'Terumo', 'Otsuka', 'Onemed', 'GEA', 'Mindray', 'Fresenius', 'Others'] as $merkName)
                            <option value="{{ $merkName }}"
                              @if (isset($excel_value['D50']))
                                @if($excel_value['D50'] == $merkName) selected @endif
                              @endif>
                              {{ $merkName }}
                            </option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                </div>

                <div class="form-group mt-3 mb-0 row">
                  <?php 
                    $rowPos = [55, 57];  
                  ?>
                  @foreach ($measuringInstruments as $index => $group)
                      <div class="form-group col">
                        <label><b>{{ 'Alat Ukur '. $group['name'] }}</b></label>
                        <select name="{{ 'B'.$rowPos[$index] }}" class="form-control">
                          <option disabled selected hidden>Pilih Alat Ukur</option>
                          @foreach ($group['instruments'] as $instrument)
                            <option value="{{$instrument}}"
                              @if (isset($excel_value['B'.$rowPos[$index]]))
                                @if($excel_value['B'.$rowPos[$index]] == $instrument) selected @endif
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
                  <select name="B64" class="form-control">
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