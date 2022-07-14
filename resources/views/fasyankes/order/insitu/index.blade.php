@extends('templates.insitu_page_layout')

{{-- Aksi di Samping Header --}}
@section('page-header-actions')
  <a href="{{ route('fasyankes.order.insitu.create') }}" class="btn btn-primary">
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
        <table class="table table-striped" id="insitu-order-table">
          <tr>
            <th class="text-center" style="width: 30px">No.</th>
            <th class="text-center" style="width: 30px">Aksi</th>
            <th>Nomor Order</th>
            <th class="text-center">Tanggal Pengajuan</th>
            <th class="text-center">Status</th>
          </tr>
          @if (count($orders) != 0)
            @foreach ($orders as $index => $data)
              <tr>
                <td class="text-center">
                  {{ $index + 1 }}
                  <span id="order-id-{{ $index }}" class="d-none">
                    {{ $data->id }}
                  </span>

                  {{-- Status Apakah Fasyankes Sudah Mengirimkan Surat Persetujuan --}}
                  <span id="approval-letter-path-{{ $index }}" class="d-none">
                    @if ($data->approval_letter_name)
                      {{ $data->approval_letter_path }}
                    @endif
                  </span>
                </td>
                <td class="text-center">
                  <div class="btn-group dropright px-0 pr-2">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-cog"></i>
                    </button>
                    <div class="dropdown-menu dropright">
                      <a class="dropdown-item has-icon" href="{{ route('print-offering-letter', ['id' => $data->id]) }}" id="btn-show-offering-letter-{{ $index }}">
                        <i class="fas fa-info-circle"></i>
                        Detail Order
                      </a>
                      <a class="dropdown-item has-icon @if($data->status != "MENUNGGU PERSETUJUAN") d-none @endif" href="#" data-toggle="modal" data-target="#approval-letter-modal" id="btn-upload-approval-{{ $index }}">
                        <i class="fas fa-file-upload"></i>
                        Kirim Surat Persetujuan
                      </a>
                      <a class="dropdown-item has-icon  @if($data->status != "MENUNGGU PEMBAYARAN") d-none @endif" href="{{ route('fasyankes.order.insitu.payment', ['id' => $data->id]) }}" >
                        @if (count($data->external_payment) == 0)
                          <i class="fas fa-file-upload"></i>
                          Upload 
                        @else
                          <i class="fas fa-file-alt"></i>
                        @endif
                        Bukti Bayar
                      </a>
                      <a class="dropdown-item has-icon @if($data->status != "TERKIRIM") d-none @endif" href="{{ route('fasyankes.order.insitu.edit', ['id' => $data->id]) }}" id="btn-edit-order-{{ $index }}">
                        <i class="fas fa-edit"></i>
                        Edit
                      </a>
                      <a class="dropdown-item has-icon @if($data->status != "TERKIRIM") d-none @endif" href="#" id="btn-cancel-{{ $index }}">
                        <i class="fas fa-trash-alt"></i>
                        Batalkan
                      </a>
                      <a class="dropdown-item has-icon @if($data->status != "SELESAI") d-none @endif" href="{{ route('fasyankes.order.insitu.certificates.index', ['id' => $data->id]) }}">
                        <i class="fas fa-folder-open"></i>
                        Lampiran
                      </a>
                      <a class="dropdown-item has-icon @if($data->status != "SELESAI" && $data->status != "MENUNGGU PEMBAYARAN") d-none @endif" href="{{ route('fasyankes.order.insitu.order-billing', ['id' => $data->id]) }}">
                        <i class="fas fa-file-invoice-dollar"></i>
                        Tagihan
                      </a>
                    </div>
                  </div>
                </td>
                <td>
                  @if ($data->status != 'TERKIRIM')
                    {{ $data->number }}
                  @else
                    -
                  @endif
                </td>
                <td class="text-center">
                    {{ FormatHelper::toIndonesianDateFormat(date('d-m-Y', strtotime($data->created_at))) }} <br>
                    {{ date('H:m', strtotime($data->created_at)) }}
                </td>
                <td class="text-center">
                  <div class="badge badge-secondary" id="status_{{ $index }}">{{ $data->status }}</div>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="5" class="text-center">Anda Belum Pernah Melakukan Order Apapun!</td>
            </tr>
          @endif
        </table>
      </div>
    </div>
  </div>
@endsection

{{-- Modal --}}
@section('modal-extends')
  <div class="modal fade" tabindex="-1" role="dialog" id="approval-letter-modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Upload Surat Persetujuan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#" method="POST" id="approval-upload-form" enctype='multipart/form-data'>
          @csrf
          @method('PUT')

          <div class="modal-body">
            <input type="hidden" name="status" id="status-input" class="d-none">

            <p>
              Upload surat penawaran yang sudah disetujui dengan menandatangani persetujuan fasyankes.
            </p>
            <div class="form-group">
              <div class="custom-file">
                  <input type="file" name="letter" class="custom-file-input" id="uploaded-file-form" required>
                  <label class="custom-file-label" for="uploaded-file-form" id="uploaded-file-label">Choose file</label>
              </div>
              <small class="d-none" id="approval-letter-description-modal">
                File Surat Persetujuan Anda Sebelumnya Dapat didownload 
                <a href="{{ asset('') }}" id="approval-letter-path-modal" target="_blank">
                  disini
                </a>.
              </small>
            </div>
          </div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-close">
              <i class="fas fa-times-circle"></i>
              Batal
            </button>
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-paper-plane mr-1"></i>
              Kirim
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

{{-- Javascript External Halaman Index --}}
@section('sub-js-extends')
  <script src="{{ asset('js/forms/file-upload-form.js') }}"></script>
  <script src="{{ asset('js/order/insitu/fasyankes/cancel-order.js') }}"></script>
  <script src="{{ asset('js/order/insitu/fasyankes/form-upload-approval-letter.js') }}"></script>
@endsection