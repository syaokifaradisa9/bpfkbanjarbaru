@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Pengajuan Eskternal</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Pengajuan Eksternal Pengujian dan Kalibrasi Alat Kesehatan</h2>
      <p class="section-lead">Melakukan pengujian dan kalibrasi di Loka Pengamanan Fasilitas Kesehatan (LPFK) Banjarbaru</p>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Edit Estimasi Pengerjaan Order</h4>
            </div>
            <form action="{{ route('yantek.order.external.update_estimation', ['id' => $order->id]) }}" method="POST">
                @csrf
                @method('PUT')
  
                <div class="card-body">
                  <div class="form-group">
                    <label><b>Alat Kesehatan yang Diorder</b></label>
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <thead>
                          <th class="text-center" style="width: 70px">No.</th>
                          <th>Nama Alat Kesehatan</th>
                          <th class="text-center" style="width: 120px">Jumlah</th>
                          <th class="text-right" style="width: 220px">Estimasi Waktu</th>
                          <th class="text-right" style="width: 220px">Total Estimasi Waktu</th>
                        </thead>
                        <tbody>
                          <?php 
                            $no = 1; 
                            $total_ammount = 0;
                            $total_hour = 0;
                            $hour = 0;
                            $minute = 0;
                            $total_minute = 0;
                          ?>
                          @foreach ($estimations as $alkesName => $estimation)
                            <tr>
                              <td class="text-center">{{ $no }}</td>
                              <td>{{ $alkesName }}</td>
                              <td class="text-center">{{ $estimation['ammount'] }}</td>
                              <td class="text-right">
                                {{ strlen($estimation['hour']) == 1 ? '0'.$estimation['hour'] : $estimation['hour'] }} Jam 
                                {{ strlen($estimation['minute']) == 1 ? '0'.$estimation['minute'] : $estimation['minute'] }} Menit 
                              </td>
                              <td class="text-right">
                                {{ strlen($estimation['total_hour']) == 1 ? '0'.$estimation['total_hour'] : $estimation['total_hour'] }} Jam 
                                {{ strlen($estimation['total_minute']) == 1 ? '0'.$estimation['total_minute'] : $estimation['total_minute'] }} Menit 
                              </td>
                            </tr>
                            <?php 
                              $no++; 
                              $hour += $estimation['hour'];
                              $minute += $estimation['minute'];
                              $total_ammount += $estimation['ammount'];
                              $total_hour += $estimation['total_hour'];
                              $total_minute += $estimation['total_minute'];
                            ?>
                          @endforeach
                
                          <?php 
                            $hour += (intdiv($minute, 60));
                            $minute = $minute % 60;
                
                            $total_hour += (intdiv($total_minute, 60));
                            $total_minute = $total_minute % 60;
                          ?>
                          <tr>
                            <td colspan="2" class="text-left">Total</td>
                            <td class="text-center">
                              <span id="total-ammount">{{ $total_ammount }}</span>
                            </td>
                            <td class="text-right">
                              {{ strlen($hour) == 1 ? '0'.$hour : $hour }} Jam 
                              {{ strlen($minute) == 1 ? '0'.$minute : $minute }} Menit 
                            </td>
                            <td class="text-right">
                              <span id="total-hour">
                                {{ strlen($total_hour) == 1 ? '0'.$total_hour : $total_hour }}
                              </span> Jam
                              <span id="total-minutes">
                                {{ strlen($total_minute) == 1 ? '0'.$total_minute : $total_minute }}
                              </span> Menit
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col">
                        <label><b>Perjalanan PP</b></label>
                        <div class="row">
                          <input type="text" class="form-control col mx-3" id="pp_hour" name="pp_hour" value="{{ $order->pp_hour ?? '0' }} Jam">
                          <input type="text" class="form-control col" id="pp_minute" name="pp_minute" value="{{ $order->pp_minute ?? '0' }} Menit">
                        </div>
                    </div>
                    <div class="form-group col">
                      <label><b>Jumlah Petugas</b></label>
                      <input type="text" class="form-control" id="officer" name="officer" value="{{ $order->total_officer ?? '0' }} Orang">
                    </div>
                  </div>
                  <div class="form-group">
                    <label><b>Estimasi Waktu Pengerjaan</b></label>
                    <p id="total_estimation_time1" class="estimation"></p>
                    <p id="total_estimation_time2" class="estimation"></p>
                    <p id="total_estimation_time3" class="estimation"></p>
                    <p id="messages">Mohon Isikan Form PP dan Jumlah Petugas Terlebih Dahulu</p>
                  </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary px-3">Edit Estimasi</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('js-extends')
  <script src="{{ asset('js/forms/estimation-form.js') }}"></script>
@endsection