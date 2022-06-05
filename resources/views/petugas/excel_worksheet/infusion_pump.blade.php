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
                        <select name="C7" class="form-control col">
                          <option value="(0 - 500) mL/h">
                            (0 - 500) mL/h
                          </option>
                          <option value="(10 - 50) mL/h">
                            (10 - 50) mL/h
                          </option>
                        </select>
                        <input name="E7" type="text" placeholder="Resolusi" class="form-control col ml-2">
                        <div class="col-2 text-left pt-2">ml/h
                        </div>
                      </div>
                      <div class="row mt-2 mx-0">
                        <select name="C8" class="form-control col">
                          <option value="(100 - 500) mL/h">
                            (100 - 500) mL/h
                          </option>
                          <option value="(100 - 300) mL/h">
                            (100 - 300) mL/h
                          </option>
                        </select>
                        <input name="E8" type="text" placeholder="Resolusi" class="form-control col ml-2">
                        <div class="col-2 text-left pt-2">ml/h
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col">
                    {{-- Kondisi Ruangan --}}
                    <label><b>Kondisi Ruangan</b></label>
                    <div class="row mx-0">
                      <input name="E17" type="text" placeholder="Suhu Awal" class="form-control col">
                      <input name="F17" type="text" placeholder="Suhu Akhir" class="form-control col ml-3">
                    </div>
                    <div class="row mx-0 mt-2">
                      <input name="E18" type="text" placeholder="Kelembapan Awal" class="form-control col">
                      <input name="F18" type="text" placeholder="Kelembapan Akhir" class="form-control col ml-3">
                    </div>
                    <input name="E19" type="text" placeholder="Kelembapan Akhir" class="form-control col mt-2">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="form-group col-3">
                    <label><b>Tanggal Penerimaan Alat</b></label>
                    <input name="E9" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tanggal Kalibrasi</b></label>
                    <input name="E10" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tempat Kalibrasi</b></label>
                    <input name="E11" type="text" class="form-control" value="{{ $alkesOrder->external_order->user->fasyenkes_name }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Nama Ruang</b></label>
                    <input name="E12" type="text" class="form-control">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="E22" value="Baik" type="radio" id="E22-a" class="custom-control-input">
                      <label class="custom-control-label" for="E22-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="E22" value="Tidak Baik" type="radio" id="E22-b" class="custom-control-input">
                      <label class="custom-control-label" for="E22-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col-2 mx-0 form-group">
                    <label><b>Fungsi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="E23" value="Baik" type="radio" id="E23-a" class="custom-control-input">
                      <label class="custom-control-label" for="E23-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="E23" value="Tidak Baik" type="radio" id="E23-b" class="custom-control-input">
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
                        <input name="J27" type="text" class="form-control text-center align-middle">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">2</td>
                      <td class="align-middle">
                        <select name="C28" class="form-control">
                          <option value="Resistansi Pembumian Protektif (kabel dapat dilepas)">
                            Resistansi Pembumian Protektif (kabel dapat dilepas)
                          </option>
                          <option value="Resistansi Pembumian Protektif (kabel tidak dapat dilepas)">
                            Resistansi Pembumian Protektif (kabel tidak dapat dilepas)
                          </option>
                        </select>
                      </td>
                      <td>
                        <input name="J28" type="text" class="form-control text-center align-middle">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">3</td>
                      <td class="align-middle">
                        <select name="C29" class="form-control">
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas I">
                            Arus bocor peralatan untuk perangkat elektromedik kelas I
                          </option>
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas II">
                            Arus bocor peralatan untuk perangkat elektromedik kelas II
                          </option>
                        </select>
                      </td>
                      <td>
                        <input name="J29" type="text" class="form-control text-center align-middle">
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
                            <input name="{{ $letter.($index + 34) }}" type="text" class="form-control text-center align-middle">
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
                          <input name="{{ $letter."41" }}" type="text" class="form-control text-center align-middle">
                        </td>
                      @endforeach
                    </tr>
                  </table>
                </div>

                <div class="form-group mt-3">
                  <label><b>Keterangan</b></label>
                  <div class="row">
                    <div class="col">
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
                        <option value="Infusion device analyzer menggunakan single channel (kosong)">Single channel (kosong)</option>
                        <option value="Infusion device analyzer menggunakan single channel (1S, SN : 3157903)">Single channel (1S, SN : 3157903)</option>
                        @foreach ($ida_sn as $data)
                            @for ($i = 1; $i <= 4; $i++)
                                <option value="Infusion device analyzer menggunakan channel {{ $i. " ". $data }})">Channel {{ $i. " ". $data }}</option>
                            @endfor 
                        @endforeach
                    </select>
                    </div>
                    <div class="col-5">
                      <select class="form-control" name="D49">
                        <option value="" disabled selected hidden>Infusion Set Merek</option>
                        @foreach (['Bbraun', 'Terumo', 'Otsuka', 'Onemed', 'GEA', 'Mindray', 'Fresenius'] as $merkName)
                            @foreach ([20, 60] as $dropNumber)
                                <option value="{{ $merkName }}, {{ $dropNumber }} drops">{{ $merkName }}, {{ $dropNumber }} drops</option>
                            @endforeach
                        @endforeach
                    </select>
                    </div>
                  </div>
                </div>

                <div class="form-group mt-3 mb-0 row">
                  <?php 
                    $rowPos = [54, 56];  
                  ?>
                  @foreach ($measuringInstruments as $index => $group)
                      <div class="form-group col">
                        <label><b>{{ 'Alat Ukur '. $group['name'] }}</b></label>
                        <select name="{{ 'B'.$rowPos[$index] }}" class="form-control">
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
                  <select name="B63" class="form-control">
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