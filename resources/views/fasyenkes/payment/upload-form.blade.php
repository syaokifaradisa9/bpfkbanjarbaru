@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Pengajuan Eskternal</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Pengajuan Eskternal Pengujian dan Kalibrasi Alat Kesehatan</h2>
      <p class="section-lead">Melakukan pengujian dan kalibrasi langsung di tempat fasyenkes berada</p>

      <div class="row">
        <div class="col-12">
          @if (Session::has('success'))
            <div class="alert alert-success mb-2">{{ Session::get('success') }}</div>
          @elseif(Session::has('error'))
            <div class="alert alert-danger mb-2">{{ Session::get('error') }}</div>
          @endif
          <div class="card">
            <div class="card-header">
              <h4>Pembayaran </h4>
            </div>
            <form action="{{ route('fasyenkes.order.external.payment-store', ['id' => $order_id]) }}" method="POST" enctype='multipart/form-data'>
              @csrf

                <div class="card-body py-0 px-4">
                    <p>
                        Kami sarankan untuk mengirimkan bukti pembayaran anda terkait order yang sudah anda lakukan agar ada pencatatan bukti bahwa anda sudah melakukan pembayaran.
                    </p>
                    <table class="table table-striped" id="payment-order-table">
                      <tr>
                        <th style="width: 10px" class="text-center">No.</th>
                        <th>File</th>
                        <th>Form Upload</th>
                        <th style="width: 10px" class="text-center">Aksi</th>
                      </tr>
                      @if (count($files) > 0)
                        @foreach ($files as $index => $file)
                          <tr>
                            <td id="number-{{ $index }}" class="align-middle text-center">{{ $index + 1 }}</td>
                            <td id="file-{{ $index }}" class="align-middle">
                              <a href="{{ asset('file_order/external/'.str_replace(' ','', $order_number).'/payment/'.$file['file_name']) }}" target="_blank">
                                File Bukti Transfer
                              </a>
                            </td>
                            <td>
                              <div class="form-group mt-3">
                                <div class="custom-file">
                                    <input type="file" name="payment_file[]" class="custom-file-input" id="payment-form-{{ $index }}" name="payment_{{ $index }}" 
                                           value="{{ public_path('file_order/external/'.str_replace(' ','', $order_number).'/payment/'.$file['file_name']) }}">
                                    <label class="custom-file-label" for="uploaded-file-form" id="payment-form-label-{{ $index }}">Choose file</label>
                                </div>
                              </div>
                            </td>
                            <td class="text-center align-middle">
                              <button class="btn btn-sm btn-danger btn-delete" id="btn-delete-{{ $index }}"><i class="fas fa-trash-alt"></i></button>
                            </td>
                          </tr>
                        @endforeach
                      @else
                        <tr>
                          <td id="number-0" class="align-middle text-center">1</td>
                          <td id="file-0" class="align-middle">
                            -
                          </td>
                          <td>
                            <div class="form-group mt-3">
                              <div class="custom-file">
                                  <input type="file" name="payment_file[]" class="custom-file-input" id="payment-form-0" name="payment_0">
                                  <label class="custom-file-label" for="uploaded-file-form" id="payment-form-label-0">Choose file</label>
                              </div>
                            </div>
                          </td>
                          <td class="text-center align-middle">
                            <button class="btn btn-sm btn-danger btn-delete" id="btn-delete-0"><i class="fas fa-trash-alt"></i></button>
                          </td>
                        </tr>
                      @endif
                      <tr>
                        <td colspan="3" class="text-center">
                          <button class="btn btn-outline-secondary" style="width: 100%" id="btn-add-upload">
                            Tambah Form Upload Bukti Order
                          </button>
                        </td>
                      </tr>
                    </table>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary px-3">Kirim Bukti Pembayaran</button>
                </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection

@section('js-extends')
  <script src="{{ asset('js/form-table/form-payment-fasyenkes.js') }}"></script>
@endsection