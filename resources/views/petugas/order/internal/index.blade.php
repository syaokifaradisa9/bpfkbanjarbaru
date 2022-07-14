@extends('templates.internal_page_layout')

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
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-bordered" id="order-table">
          <thead>
            <tr>
              <th class="text-center" style="width: 20px">No.</th>
              <th class="text-center" style="width: 20px">Aksi</th>
              <th class="text-center" style="width: 120px">Nomor Order</th>
              <th class="text-center" style="width: 175px">Fasyankes</th>
              <th class="text-center" style="width: 145px">Contact Person</th>
              <th class="text-center" style="width: 135px">Estimasi Pengiriman</th>
              <th class="text-center" style="width: 135px">Estimasi Sampai</th>
              <th class="text-center">Keterangan</th>
              <th class="text-center" style="width: 120px">Status</th>
            </tr>
          </thead>
          <tbody>
            @if(count($orders) > 0)
              @foreach ($orders as $index => $data)
                <tr>
                  <td class="text-center">
                    {{ $index + 1 }}
                    <span id="order-id-{{ $index }}" class="d-none">
                      {{ $data->id }}
                    </span>
                  </td>
                  <td class="text-center">
                    <div class="btn-group dropright px-0 pr-2">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-cog"></i>
                        </button>
                        <div class="dropdown-menu dropright">
                          <a class="dropdown-item has-icon" href="#">
                            <i class="fas fa-info-circle"></i>
                            Detail Order
                          </a>
                          <a class="dropdown-item has-icon text-success @if($data->status != "MENUNGGU") d-none @endif" data-toggle="modal" data-id="{{ $index }}1" data-target="#orderModal" href="#" id="accept-{{ $index }}">
                            <i class="fas fa-check-circle"></i>
                            Terima
                          </a>
                          <a class="dropdown-item has-icon text-danger @if($data->status != "MENUNGGU") d-none @endif" data-toggle="modal" data-id="{{ $index }}2" data-target="#orderModal" href="#" id="refuse-{{ $index }}">
                            <i class="fas fa-window-close"></i>
                            Tolak
                          </a>
                          <a href="{{ route('petugas.order.internal.alkes-reception', ['id' => $data->id]) }}" class="dropdown-item has-icon @if($data->status != "ORDER DITERIMA") d-none @endif">
                            <i class="fas fa-hand-holding"></i>
                            Penerimaan Alat
                          </a>
                          <a href="{{ route('petugas.order.internal.alkes-handover', ['id' => $data->id]) }}" class="dropdown-item has-icon @if($data->status != "PEMBAYARAN LUNAS") d-none @endif">
                            <i class="fas fa-hand-holding"></i>
                            Penyerahan Alat
                          </a>
                          <a href="{{ route('petugas.order.internal.alkes-handover-print', ['id' => $data->id]) }}" class="dropdown-item has-icon @if($data->status != "ALAT DAN SERTIFIKAT TELAH DISERAHKAN") d-none @endif">
                            <i class="fas fa-hand-holding"></i>
                            Bukti Penyerahan Alat
                          </a>
                        </div>
                      </div>
                  </td>
                  <td class="text-center">{{ $data->number ?? '-' }}</td>
                  <td id="fasyankes-name-{{ $index }}">
                    {{ $data->user->fasyankes_name." ".$data->user->city." ".$data->user->province }} <br>
                  </td>
                  <td>
                    {{ $data->contact_person_name }} <br>
                    {{ $data->contact_person_phone }}
                  </td>
                  <td class="text-center">{{ date('d-m-Y', strtotime($data->delivery_date_estimation)) }}</td>
                  <td class="text-center">{{ date('d-m-Y', strtotime($data->arrival_date_estimation)) }}</td>
                  <td>{{ $data->description ?? '-' }}</td>
                  <td class="text-center">{{ ucwords(strtolower($data->status)) }}</td>
                </tr>
              @endforeach
            @else
                <tr>
                  <td colspan="9" class="text-center">
                    Tidak Ada Order!
                  </td>
                </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@section('modal-extends')
  <div class="modal fade" tabindex="-1" role="dialog" id="orderModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#" method="post" id="confirmation-form">
            @csrf
            @method('PUT')

            <input type="hidden" name="status" id="status-input" class="d-none">

            <p>
              Isikan keterangan untuk ditampilkan ke pihak <span id="fasyankes-name-description"></span>
            </p>
            <div class="form-group">
              <input type="text" class="form-control" name="description" id="description-input">
            </div>
          </form>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-close">
            <i class="fas fa-times-circle"></i>
            Tutup
          </button>
          <button type="button" class="btn btn-primary" id="btn-submit">
            <i class="fas fa-paper-plane mr-1"></i>
            Kirim
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('sub-js-extends')
  <script src="{{ asset('js/order-table/petugas-order-table.js') }}"></script>
@endsection