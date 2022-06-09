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
              <h4>Edit Akomodasi Order</h4>
            </div>
            <form action="{{ route('yantek.order.external.update_accommodation', ['id' => $order->id]) }}" method="POST">
                @csrf
                @method('PUT')
  
                <div class="card-body py-0 px-4">
                  <div class="row">
                    <div class="form-group col">
                        <label><b>Akomodasi</b></label>
                        <input type="text" class="form-control" id="accommodation_cost" name="accommodation_cost" value="Rp. {{ $order->accommodation ?? '0' }}">
                    </div>
                    <div class="form-group col">
                      <label><b>Rapid Test</b></label>
                      <input type="text" class="form-control" id="rapid_cost" name="rapid_cost" value="Rp. {{ $order->rapid_test_accommodation ?? '0' }}">
                    </div>
                    <div class="form-group col">
                        <label><b>Uang Harian</b></label>
                        <input type="text" class="form-control" id="daily_cost" name="daily_cost" value="Rp. {{ $order->daily_accommodation ?? '0' }}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                        <label><b>Keterangan Akomodasi</b></label>
                        <input type="text" class="form-control" name="accommodation_cost_description" placeholder="Keterangan Penggunaan Akomodasi" value='{{ $order->accommodation_description ?? '' }}'>
                    </div>
                    <div class="form-group col-6">
                      <label><b>Keterangan Rapid Test</b></label>
                      <input type="text" class="form-control" name="rapid_cost_description" placeholder="Keterangan Penggunaan Akomodasi Rapid Test" value='{{ $order->rapid_test_description ?? '' }}'>
                    </div>
                    <div class="form-group col-6">
                        <label><b>Keterangan Uang Harian</b></label>
                        <input type="text" class="form-control" name="daily_cost_description" placeholder="Keterangan Penggunaan Akomodasi Uang Harian Petugas" value='{{ $order->daily_description ?? '' }}'>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary px-3">Edit Akomodasi</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('js-extends')
  <script src="{{ asset('js/forms/accommodation-form.js') }}"></script>
@endsection