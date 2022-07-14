@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>{{ $page_title ?? 'Pengajuan Layanan Internal' }}</h1>
      <div class="section-header-breadcrumb">
        @yield('page-header-actions')
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Pengajuan Layanan Internal Pengujian dan Kalibrasi Alat Kesehatan</h2>
      <p class="section-lead">Melakukan pengujian dan kalibrasi di laboratorium LPFK Banjarbaru</p>

      <div class="row">
        <div class="col-12">
          @yield('sub-content')
        </div>
      </div>

    </div>
  </section>
  @yield('modal-extends')
@endsection

@section('js-extends')
  @yield('sub-js-extends')
@endsection