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
                      <th class="text-center" style="width: 30px">No.</th>
                      <th class="text-center" style="width: 180px">Fasyenkes</th>
                      <th class="text-center" style="width: 150px">Tanggal</th>
                      <th class="text-center">Nomor Order</th>
                      <th class="text-center">Nomor Surat</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $index => $data)
                      <tr>
                        <td class="text-center">
                          <input id="id_{{ $index }}" class="order_id" type="hidden" value="{{ $data->id }}" readonly>
                          {{ $index + 1 }}
                        </td>
                        <td>
                          {{ $data->user->fasyenkes_name." ".$data->user->city." ".$data->user->province }}
                        </td>
                        <td class="text-center">{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                        <td class="pt-3">
                          <div class="form-group">
                            <input type="text" id="order_number_{{ $index }}" class="form-control order_number_form" name="order_number[]" value="{{ $data->number ?? 'E -  DL' }}">
                          </div>
                        </td>
                        <td class="pt-3">
                          <div class="form-group">
                            <input type="text" id="letter_number_{{ $index }}" class="form-control letter_number_form" name="letter_number[]" value="{{ $data->number ?? 'E -  DL' }}">
                          </div>
                        </td>
                        
                        <td class="text-center">
                          <div class="badge badge-secondary">{{ $data->status }}</div>
                        </td>
                        <td class="text-center">
                          <a href="#" class="btn btn-primary">Detail</a>
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
  <script src="{{ asset('js/yantek/order/number_form_event.js') }}"></script>
  <script src="{{ asset('js/yantek/order/letter_form_event.js') }}"></script>
@endsection