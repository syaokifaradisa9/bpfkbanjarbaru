@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Lembar Kerja</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Pengajuan Eksternal Pengujian dan Kalibrasi Alat Kesehatan</h2>
      <p class="section-lead">Melakukan pengujian dan kalibrasi di Loka Pengamanan Fasilitas Kesehatan (LPFK) Banjarbaru</p>

      <div class="row">
        <div class="col-12">
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
                                            <a class="dropdown-item has-icon" href="{{ route('petugas.order.external.worksheet.excel.index', ['order_id' => $order_id, 'alkes_order_id' => $order->id]) }}">
                                              <i class="fas fa-envelope-open-text"></i> Kerjakan
                                            </a>
                                          @else
                                            <a class="dropdown-item has-icon" href="">
                                              <i class="fas fa-envelope-open-text"></i> Edit
                                            </a>
                                            <a class="dropdown-item has-icon" href="" target="_blank">
                                              <i class="fas fa-envelope-open-text"></i> Sertifikat
                                            </a>
                                            <a class="dropdown-item has-icon" href="" target="_blank">
                                              <i class="fas fa-envelope-open-text"></i> Hasil
                                            </a>
                                          @endif
                                        </div>
                                      </div>
                                    </th>
                                    <td class="align-middle">{{ $order->alkes->name }}</td>
                                    <td class="text-center align-middle">
                                        @if ($order->status == 0)
                                          <span class="badge badge-warning">Belum Selesai</span>
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