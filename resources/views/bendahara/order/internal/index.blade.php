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
                      <th class="text-center">Aksi</th>
                      <th class="text-center">Nomor Order</th>
                      <th class="text-center">Fasyankes</th>
                      <th class="text-center">Tanggal Selesai</th>
                      <th class="text-center">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $index => $order)
                      <tr>
                        <td class="text-center align-middle">
                          {{ $index + 1 }}
                          <span id="order-id-{{ $index }}" class="d-none">
                            {{ $order->id }}
                          </span>
                        </td>
                        <td>
                          <div class="btn-group dropright px-0 pr-2">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-cog"></i>
                            </button>
                            <div class="dropdown-menu dropright">
                              <a class="dropdown-item has-icon" href="{{ route('print-offering-letter', ['id' => $order->id]) }}">
                                <i class="fas fa-info-circle"></i>
                                Detail Order
                              </a>
                              @if ($order->internal_payment)
                                <a class="dropdown-item has-icon" href="{{ route('print-offering-letter', ['id' => $order->id]) }}">
                                  <i class="fas fa-file-invoice-dollar"></i>
                                  Bukti Pembayaran
                                </a>
                              @endif
                              <a class="dropdown-item has-icon text-success @if($order->status == 'SELESAI') d-none @endif" href="#" id="btn-confirm-payment-{{ $index }}">
                                <i class="fas fa-edit"></i>
                                Konfirmasi Pembayaran
                              </a>
                            </div>
                          </div>
                        </td>
                        <td class="text-center align-middle">
                          {{ $order->number }}
                        </td>
                        <td class="text-center align-middle">
                          {{ $order->user->category . ' '. $order->user->type .  ' ' . $order->user->fasyankes_name. ' '. $order->user->city . ' ' . $order->user->province }}
                        </td>
                        <td class="text-center align-middle">
                          {{ FormatHelper::toIndonesianDateFormat($order->finishing_date) }}
                        </td>
                        <td class="text-center align-middle" id="status_{{ $index }}">
                          {{ $order->status }}
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
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
  <script src="{{ asset('js/action_table/payment-confirmation.js') }}"></script>
@endsection