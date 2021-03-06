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
      <div class="card-header-form">
        <form>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-btn">
              <button class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-bordered" id="order-table">
          <thead>
            <tr>
              <th class="text-center" style="width: 15px">No</th>
              <th class="text-center" style="width: 20px">Aksi</th>
              <th class="text-center" style="width: 190px">Fasyankes</th>
              <th class="text-center" style="width: 140px">Waktu Pengajuan</th>
              <th class="text-center" style="width: 210px">Nomor Order</th>
              <th class="text-center" style="width: 135px">Estimasi</th>
              <th class="text-center" style="width: 160px">Akomodasi</th>
              <th class="text-center" style="width: 130px">No. Surat keluar</th>
              <th class="text-center" style="width: 50px">Status</th>
            </tr>
          </thead>
          <tbody>
            @if(count($orders) > 0)
              @foreach ($orders as $index => $data)
                <tr>
                  <td class="text-center">
                    <input id="id_{{ $index }}" class="order_id d-none" type="hidden" value="{{ $data->id }}" readonly>
                    {{ $index + 1 }}
                  </td>
                  <td class="text-center">
                    <div class="btn-group dropright px-0">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                      </button>
                      <div class="dropdown-menu dropright">
                        <a class="dropdown-item has-icon" href="#"><i class="fas fa-info-circle"></i> Detail</a>
                        <a class="dropdown-item has-icon" href="{{ asset($data->letter_path) }}" target="_blank">
                          <i class="fas fa-envelope-open-text"></i> 
                          Surat Masuk
                        </a>
                        <a class="dropdown-item has-icon @if(!$data->out_letter_number) d-none @endif" href="{{ route('print-offering-letter', ['id' => $data->id]) }}" id="btn-show-offering-letter-{{ $index }}">
                          <i class="fas fa-file-alt"></i> 
                          Cetak Penawaran
                        </a>
                        <a class="dropdown-item has-icon @if(!$data->out_letter_number) d-none @endif" href="#" id="btn-send-offering-letter-{{ $index }}">
                          <i class="fas fa-paper-plane"></i> 
                          Kirim Penawaran
                        </a>
                        <a class="dropdown-item has-icon text-green @if(!$data->approval_letter_name) d-none @endif" href="{{ asset($data->approval_letter_path) }}" target="_blank">
                          <i class="fas fa-envelope-open-text"></i>
                          Surat Persetujuan
                        </a>
                        <a class="dropdown-item has-icon text-green @if($data->status != 'MENUNGGU PERSETUJUAN') d-none @endif" href="#" id="confirm-agreement-{{ $index }}">
                          <i class="fas fa-check-square"></i> 
                          Konfirmasi Persetujuan
                        </a>
                        <a class="dropdown-item has-icon text-green @if($data->status != 'DISETUJUI') d-none @endif" href="#" id="confirm-departure-{{ $index }}">
                          <i class="fas fa-check-square"></i> 
                          Konfirmasi Keberangkatan
                        </a>
                      </div>
                    </div>
                  </td>
                  <td>
                    {{ $data->user->fasyankes_name." ".$data->user->city." ".$data->user->province }}
                  </td>
                  <td class="text-center">
                    {{ FormatHelper::toIndonesianDateFormat(date('d-m-Y', strtotime($data->created_at))) }} <br>
                    {{ date('H:m', strtotime($data->created_at)) }}
                  </td>
                  <td class="pt-3">
                    <div class="form-group">
                      <input type="hidden" value="{{ $data->number }}" class="default_order_number" readonly>
                      <input type="text" id="order_number_{{ $index }}" class="form-control order_number_form" name="order_number[]" value="{{ $data->number }}">
                    </div>
                  </td>
                  <td class="text-center">
                    <a id="estimation_{{ $index }}" href="{{ route('yantek.order.insitu.edit_estimation', ['id' => $data->id]) }}">
                      {{ $data->estimation_day }} Hari / {{ $data->total_officer ?? 0 }} Petugas
                      <span id="selected-officer-{{ $index }}" class="d-none">{{ $data->total_officer_selected ?? 0 }}</span>
                    </a>
                  </td>
                  <td class="text-center">
                    <a id="accommodation_{{ $index }}" href="{{ route('yantek.order.insitu.edit_accommodation', ['id' => $data->id]) }}">
                      Rp. {{ FormatHelper::toIndonesianCurrencyFormat($data->total_accommodation) }}
                    </a>
                  </td>
                  <td class="pt-3">
                    <div class="form-group">
                      <input type="text" id="out_letter_number_{{ $index }}" class="form-control" name="out_letter_number[]" value="{{ $data->out_letter_number }}">
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="badge badge-secondary" id="status_{{ $index }}">
                      @if ($data->status == 'MENUNGGU PERSETUJUAN')
                        MENUNGGU<br>PERSETUJUAN
                      @elseif($data->status == 'DALAM PERJALANAN')
                        DALAM<br>PERJALANAN
                      @else
                        {{$data->status}}
                      @endif
                    </div>
                  </td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan="9" class="text-center">
                  Anda Belum Pernah Melakukan Order!
                </td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

{{-- Javascript External Halaman Index --}}
@section('sub-js-extends')
  {{-- Form dalam Tabel --}}
  <script src="{{ asset('js/order/insitu/yantek/order-number-form.js') }}"></script>
  <script src="{{ asset('js/order/insitu/yantek/outgoing-number-form.js') }}"></script>

  {{-- Tombol dalam tabel --}}
  <script src="{{ asset('js/order/insitu/yantek/accommodation_estimation_link.js') }}"></script>

  {{-- Tombol Aksi dalam Tabel --}}
  <script src="{{ asset('js/order/insitu/yantek/send-offering-letter.js') }}"></script>
  <script src="{{ asset('js/order/insitu/yantek/update-status.js') }}"></script>
@endsection