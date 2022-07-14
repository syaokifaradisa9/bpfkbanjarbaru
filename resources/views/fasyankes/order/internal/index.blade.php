@extends('templates.internal_page_layout')

{{-- Aksi di Samping Header --}}
@section('page-header-actions')
  <a href="{{ route('fasyankes.order.internal.create') }}" class="btn btn-primary">
    <i class="fas fa-plus mr-1"></i>
    Tambah Order
  </a>
@endsection

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
        <table class="table table-striped">
          <tr>
            <th class="text-center" style="width: 30px">No.</th>
            <th class="text-center" style="width: 30px">Aksi</th>
            <th class="text-center" style="width: 120px">Nomor Order</th>
            <th class="text-center" style="width: 100px">Contact Person</th>
            <th class="text-center" style="width: 30px">Surat Pengantar</th>
            <th class="text-center" style="width: 130px">Waktu Pengajuan</th>
            <th class="text-center" style="width: 130px">Estimasi Pengiriman</th>
            <th class="text-center">Keterangan</th>
            <th class="text-center" style="width: 80px">Status</th>
          </tr>
          @if (count($orders) > 0)
            @foreach ($orders as $index => $data)
              <tr>
                <td class="text-center align-middle">{{ $index + 1 }}</td>
                <td class="text-center align-middle">
                  <div class="btn-group dropright px-0 pr-2">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-cog"></i>
                    </button>
                    <div class="dropdown-menu dropright">
                      <a class="dropdown-item has-icon" href="{{ route('print-offering-letter', ['id' => $data->id]) }}" id="btn-show-offering-letter-{{ $index }}">
                        <i class="fas fa-info-circle"></i>
                        Detail Order
                      </a>
                      <a class="dropdown-item has-icon @if($data->status != "MENUNGGU" && $data->status != "DITOLAK") d-none @endif" href="{{ route('fasyankes.order.internal.edit', ['id' => $data->id]) }}" id="btn-edit-order-{{ $index }}">
                        <i class="fas fa-edit"></i>
                        Edit
                      </a>
                      <a class="dropdown-item has-icon  @if($data->status != "MENUNGGU PEMBAYARAN") d-none @endif" href="{{ route('fasyankes.order.internal.payment', ['id' => $data->id]) }}" >
                        @if (count($data->internal_payment) == 0)
                          <i class="fas fa-file-upload"></i>
                          Upload 
                        @else
                          <i class="fas fa-file-alt"></i>
                        @endif
                        Bukti Bayar
                      </a>
                      <a class="dropdown-item has-icon @if($data->status != "ALAT DAN SERTIFIKAT TELAH DISERAHKAN" && $data->status != "PEMBAYARAN LUNAS") d-none @endif" href="{{ route('fasyankes.order.internal.certificates.index', ['id' => $data->id]) }}">
                        <i class="fas fa-folder-open"></i>
                        Lampiran
                      </a>
                      <a class="dropdown-item has-icon @if($data->status != "ALAT DAN SERTIFIKAT TELAH DISERAHKAN" && $data->status != "MENUNGGU PEMBAYARAN") d-none @endif" href="{{ route('fasyankes.order.internal.order-billing', ['id' => $data->id]) }}">
                        <i class="fas fa-file-invoice-dollar"></i>
                        Tagihan
                      </a>
                    </div>
                  </div>
                </td>
                <td class="text-center align-middle">{{ $data->number ?? '-'}}</td>
                <td class="align-middle">
                  {{ $data->contact_person_name }} <br>
                  {{ $data->contact_person_phone }}
                </td>
                <td class="text-center align-middle">
                  @if ($data->letter_name)
                    <a href="{{ asset($data->letter_path) }}" target="_blank">File</a>
                  @else
                    -
                  @endif
                </td>
                <td class="text-center align-middle">
                  {{ date('d-m-Y', strtotime($data->created_at)) }}
                </td>
                <td class="text-center align-middle">
                  {{ date('d-m-Y', strtotime($data->delivery_date_estimation)) }} s/d <br>
                  {{ date('d-m-Y', strtotime($data->arrival_date_estimation)) }}
                </td>
                <td>{{ $data->description ?? '-' }}</td>
                <td class="text-center align-middle">
                  <div class="badge badge-secondary">
                    @if ($data->status == "ALAT DAN SERTIFIKAT TELAH DISERAHKAN")
                      Alat & Sertifikat<br>
                      Telah Diserahkan
                    @else
                      {{ ucwords(strtolower($data->status)) }}
                    @endif
                  </div>
                </td>
              </tr>
            @endforeach
          @else
              <tr>
                <td colspan="8" class="text-center text-secondary">
                  Anda Belum Pernah Melakukan Order Internal
                </td>
              </tr>
          @endif
        </table>
      </div>
    </div>
  </div>
@endsection