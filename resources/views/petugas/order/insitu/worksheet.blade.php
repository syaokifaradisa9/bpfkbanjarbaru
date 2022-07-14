@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Lembar Kerja</h1>
      @if($order_status != "MENUNGGU PEMBAYARAN")
        <div class="section-header-breadcrumb">
          <td><a href="{{ route('petugas.order.external.insert', ['order_id' => $order_id]) }}" class="btn btn-primary mr-2">
            <i class="fas fa-plus mr-1"></i>
            Tambah Alat Kesehatan
          </a></td>
          <td>
            <form action="{{ route('petugas.order.external.finishing', ['order_id' => $order_id]) }}" method="post" id="finishing-form">
              @csrf
              @method('PUT')
              <button id="finishing-confirm-button" class="btn btn-success" type="submit">
                <i class="fas fa-check-circle mr-1"></i>
                Konfirmasi Selesai
              </button>
            </form>
          </td>
        </div>
      @endif
    </div>

    <div class="section-body">
      <h2 class="section-title">Pengajuan Eksternal Pengujian dan Kalibrasi Alat Kesehatan</h2>
      <p class="section-lead">Melakukan pengujian dan kalibrasi di Loka Pengamanan Fasilitas Kesehatan (LPFK) Banjarbaru</p>

      <div class="row">
        <div class="col-12">
            @if (Session::has('success'))
                <div class="alert alert-success mb-2">{{ Session::get('success') }}</div>
            @elseif(Session::has('error'))
                <div class="alert alert-danger mb-2">{{ Session::get('error') }}</div>
            @endif
            <div class="card">
              <div class="card-header">
                <h4>Tabel Alat Kesehatan</h4>
                <div class="card-header-form">
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No.</th>
                                <th scope="col" class="text-center">Aksi</th>
                                <th scope="col">Alat Kesehatan</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Dikerjakan Oleh</th>
                            </tr>
                        </thead>
                        @foreach ($alkes_orders as $index => $order)
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-center align-middle">{{ $index + 1 }}</th>
                                    <th class="text-center">
                                      <div class="btn-group dropright px-0">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fas fa-cog"></i>
                                        </button>
                                        <div class="dropdown-menu dropright">

                                          @if ($order->status == 0)
                                            @if($order_status != "MENUNGGU PEMBAYARAN")
                                              <a class="dropdown-item has-icon" href="{{ route('petugas.order.external.worksheet.excel.index', ['order_id' => $order_id, 'alkes_order_id' => $order->id]) }}">
                                                <i class="fas fa-file-alt"></i> Kerjakan
                                              </a>
                                            @endif
                                          @else
                                            @if($order_status != "MENUNGGU PEMBAYARAN")
                                              <a class="dropdown-item has-icon" href="{{ route('petugas.order.external.worksheet.excel.edit', ['order_id' => $order_id, 'alkes_order_id' => $order->id]) }}">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                              </a>
                                            @endif
                                            <a class="dropdown-item has-icon" href="{{ route('petugas.order.external.worksheet.excel.certificate', ['order_id' => $order_id, 'alkes_order_id' => $order->id]) }}" target="_blank">
                                              <i class="fas fa-file-pdf"></i>
                                              Sertifikat
                                            </a>
                                            <a class="dropdown-item has-icon" href="{{ route('petugas.order.external.worksheet.excel.result', ['order_id' => $order_id, 'alkes_order_id' => $order->id]) }}" target="_blank">
                                              <i class="fas fa-file-contract"></i>
                                              Hasil
                                            </a>
                                          @endif
                                        </div>
                                      </div>
                                    </th>
                                    <td class="align-middle">{{ $order->alkes->name }}</td>
                                    <td class="text-center align-middle">
                                        @if ($order->status == 0)
                                          @if ($order_status == 'MENUNGGU PEMBAYARAN')
                                            <span class="badge badge-danger">Tidak Dikerjakan</span>
                                          @else
                                            <span class="badge badge-warning">Belum Selesai</span>
                                          @endif
                                        @else
                                          <span class="badge badge-success">Selesai</span>
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">{{ $order->officer ?? '-' }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
@endsection

@section('js-extends')
  <script src="{{ asset('js/button/finishing_button_event.js') }}"></script>
@endsection