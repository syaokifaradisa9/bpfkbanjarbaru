@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Lembar Kerja Excel</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Pengajuan Eksternal Pengujian dan Kalibrasi Alat Kesehatan</h2>
      <p class="section-lead">Melakukan pengujian dan kalibrasi di Loka Pengamanan Fasilitas Kesehatan (LPFK) Banjarbaru</p>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>{{ $alkes->name }}</h4>
            </div>
            <div class="card-body p-0">
              <div class="row">
                <div class="form-group col">
                  <label>Nomor Sertifikat</label>
                  <input type="text" class="form-control" value="{{ $certificate_number }}">
                </div>
                <div class="form-group">
                  <label>Nomor Order</label>
                  <input type="text" class="form-control" value="{{ $order->number }}" readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection