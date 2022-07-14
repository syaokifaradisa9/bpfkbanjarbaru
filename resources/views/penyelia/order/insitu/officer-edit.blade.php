@extends('templates.insitu_page_layout')

{{-- Component Utama --}}
@section('sub-content')
  @if (Session::has('success'))
    <div class="alert alert-success mb-2">{{ Session::get('success') }}</div>
  @elseif(Session::has('error'))
    <div class="alert alert-danger mb-2">{{ Session::get('error') }}</div>
  @endif
  <div class="card">
    <div class="card-header">
      <h4>Tabel Pengajuan</h4>
    </div>
    <form action="{{ route('penyelia.order.insitu.officer-update', ['id' => $order->id]) }}" method="post" class="mt-4">
      @csrf
      
      <div class="card-body px-4">
          <div class="row">
              <label class="col-12"><b>Data Order</b></label>
              <div class="col-6 row">
                  <label class="col-4">Nomor Order</label>
                  <p class="col-8">: {{ $order->number }}</p>

                  <label class="col-4">Fasyankes</label>
                  <p class="col-8">: {{ $order->user->fasyankes_name . ' ' . $order->user->city . ' ' . $order->user->province }}</p>

                  <label class="col-4">Lokasi</label>
                  <p class="col-8">: {{ $order->user->address }}</p>

                  <label class="col-4">Estimasi Perjalanan</label>
                  <p class="col-8">: {{ $order->pp_hour }} Jam {{ $order->pp_minute }} Menit</p>

                  <label class="col-4">Estimasi Petugas</label>
                  <p class="col-8">: <span id="max-officer">{{ $order->total_officer }}</span> Orang</p>
              </div>
              <div class="col-6 row"></div>
          </div>

          <div class="form-group">
            <label class="mt-3"><b>Ketua Tim Kalibrasi (Pilih 1 Orang)</b></label>
            <div class="row px-3">
                @foreach ($officers as $officer)
                    <div class="custom-control custom-checkbox col-lg-3 col-md-4 mb-1">
                        <input type="checkbox" 
                              class="custom-control-input officer-chief-checkbox" 
                              id="officer_chief_{{ $officer->id }}" 
                              name="chief_{{ $officer->id }}" 
                              class="officer-checkbox"
                              @if ($officer->id == $chiefOfficer) checked @endif>
                        <label class="custom-control-label" for="officer_chief_{{ $officer->id }}" name="{{ $officer->id }}" id="officer_chief_name_{{ $officer->id }}">
                          @if ($officer->id == $chiefOfficer)
                            <strong>{{ $officer->name }} </strong>
                          @else
                            {{ $officer->name }}
                          @endif
                        </label>
                    </div>
                @endforeach
            </div>
          </div>

          <div class="form-group">
            <label class="mt-3"><b>Petugas Kalibrasi (Pilih {{ $order->total_officer - 1 }} Orang)</b></label>
            <div class="row px-3">
                @foreach ($officers as $officer)
                    <div class="custom-control custom-checkbox col-lg-3 col-md-4 mb-1">
                        <input type="checkbox" 
                              class="custom-control-input officer-checkbox" 
                              id="{{ $officer->id }}" 
                              name="officer_{{ $officer->id }}" 
                              class="officer-checkbox"
                              @if (in_array($officer->id, $officerExists)) checked @endif>
                        <label class="custom-control-label" for="{{ $officer->id }}" name="{{ $officer->id }}">
                          @if (in_array($officer->id, $officerExists))
                            <strong>{{ $officer->name }} </strong>
                          @else
                            {{ $officer->name }}
                          @endif
                        </label>
                    </div>
                @endforeach
            </div>
          </div>

          <div class="mt-4 form-group">
            <label><b>Tanggal Kegiatan</b></label>
            <table class="table table-striped" id="activity-date-table">
              <thead>
                <tr>
                  <th class="text-center" style="width: 15px">No.</th>
                  <th class="text-center">Tanggal Mulai</th>
                  <th class="text-center">Tanggal Selesai</th>
                  <th class="text-center">Sub Total</th>
                  <th class="text-center" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $totalExistingData = count($order->activity_date_order);  
                  $totalExistingData = $totalExistingData != 0 ? $totalExistingData : 1;
                ?>
                @for ($i = 0; $i < $totalExistingData; $i++)
                  <tr>
                    <td class="text-center" id="number-0">
                      {{ $i + 1 }}
                    </td>
                    <td>
                      <input type="date" class="form-control" name="start_date[]" id="start-date-{{ $i }}"value="{{ $order->activity_date_order[$i]->start_date ?? '' }}">
                    </td>
                    <td>
                      <input type="date" class="form-control" name="end_date[]" id="end-date-{{ $i }}" value="{{ $order->activity_date_order[$i]->end_date ?? '' }}">
                    </td>
                    <td class="text-center">
                      <span id="sub-total-{{ $i }}">
                        {{ $order->activity_date_order[$i]->difference_day ?? 0 }}
                      </span> Hari
                    </td>
                    <td class="text-center">
                      <button class="btn btn-sm btn-danger btn-delete" id="btn-delete-{{ $i }}">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </td>
                  </tr>
                @endfor
                <tr>
                  <td colspan="3"><b>Total</b></td>
                  <td class="text-center">
                    <span id="total-day">0</span> Hari
                  </td>
                  <td class="text-center">
                    <button class="btn btn-primary" id="btnAddRow">+</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
      <div class="card-footer text-right">
          <button class="btn btn-primary px-3">
            <i class="fas fa-edit mr-1"></i>
            Edit Petugas
          </button>
      </div>
    </form>
</div>
@endsection
  
{{-- Javascript External Halaman Index --}}
@section('sub-js-extends')
  <script src="{{ asset('js/order/insitu/penyelia/officer-form.js') }}"></script>
  <script src="{{ asset('js/order/insitu/penyelia/activity-date-range.js') }}"></script>
@endsection