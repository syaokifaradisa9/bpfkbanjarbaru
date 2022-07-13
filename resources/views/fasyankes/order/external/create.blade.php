@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Pengajuan Eskternal</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Pengajuan Eskternal Pengujian dan Kalibrasi Alat Kesehatan</h2>
      <p class="section-lead">Melakukan pengujian dan kalibrasi langsung di tempat fasyankes berada</p>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Form Tambah Order</h4>
            </div>
            <form action="{{ route('fasyankes.order.external.store') }}" method="POST" enctype='multipart/form-data' id="form-external-order">
              @csrf

              <div class="card-body py-0 px-4">
                <div class="form-group">
                  <label><b>Surat Permohonan</b></label>
                  <div class="custom-file">
                      <input type="file" name="letter" class="custom-file-input @error('letter') is-invalid @enderror" id="uploaded-file-form">
                      <label class="custom-file-label" for="uploaded-file-form" id="uploaded-file-label">Choose file</label>
                  </div>
                  <small id="upload-error-message" class="text-danger d-none"></small> <br>
                  <small>Jika anda tidak memiliki format suratnya maka bisa didownload <a href="https://bpfk-banjarbaru.org/wp-content/uploads/2021/02/MOU-PENGUJIAN-dan-KALIBRASI-LPFK-BJB-Rev.6.docx">disini</a></small>
                  @error('letter')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="row">
                  <div class="form-group col">
                    <label><b>Nomor Surat</b></label>
                    <input type="number" class="form-control @error('letter_number') is-invalid @enderror" name="letter_number" placeholder="Masukkan nomor surat yang telah diupload di atas" value="{{ old('letter_number') }}" id="letter_number">
                    <small id="letter-number-error-message" class="text-danger d-none"></small>
                    <small>Contoh input nomor surat bisa dilhat <a href="{{ asset('img/contoh_nomor_surat.jpg') }}" target="_blank">disini</a></small>
                    @error('letter_number')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group col">
                    <label><b>Tanggal Surat</b></label>
                    <input type="date" class="form-control @error('letter_date') is-invalid @enderror" name="letter_date" value="{{ old('letter_date') }}" id="letter_date">
                    <small id="letter-date-error-message" class="text-danger d-none"></small>
                    @error('letter_date')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label class="mt-3"><b>Alat Kesehatan</b></label>
                  <div class="table-responsive">
                    <table class="table table-striped" id="alkes-order-table">
                      <tr>
                        <th style="width: 15px">No.</th>
                        <th style="width: 187px">Layanan</th>
                        <th style="width: 230px">Alat Kesehatan</th>
                        <th style="width: 140px">Tarif</th>
                        <th style="width: 121px">Jumlah</th>
                        <th style="width: 148px">Sub Total</th>
                        <th>Keterangan</th>
                        <th style="width: 2px">Aksi</th>
                      </tr>
                      <tr>
                        <?php $id = 0; ?>
                        <td id="number_{{ $id }}">1</td>
                        <td class="pt-3">
                          <div class="form-group" style="width: 100%">
                            <select class="form-control select2 category-select" name="category[]" id="category_{{ $id }}">
                              <option value="-" selected hidden>Pilih Layanan</option>
                              @foreach ($categories as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </td>
                        <td class="pt-3">
                          <div class="form-group align-middle">
                            <select class="form-control select2 alkes-select" name="alkes[]" id="alkes_{{ $id }}">
                              <option value="-">-</option>
                            </select>
                          </div>
                        </td>
                        <td id="price_0" class="text-right">Rp. 0</td>
                        <td class="pt-3">
                          <div class="form-group">
                            <input type="number" class="form-control text-center ammount-input" name="ammount[]" value="1" id="ammount_{{ $id }}">
                          </div>
                        </td>
                        <td class="text-right" id="subtotal_0"></td>
                        <td class="text-center pt-3">
                          <div class="form-group">
                            <textarea class="form-control" name="description[]" id="description_{{ $id }}"> </textarea>
                          </div>
                        </td>
                        <td class="text-center">
                          <button class="btn btn-sm btn-danger btn_delete" id="btnDelete_0"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="4"><b>Total</b></td>
                        <td class="text-center" id="total_ammount">4</td>
                        <td class="text-right" id="total_price">Rp.0</td>
                        <td></td>
                        <td class="text-center">
                          <button class="btn btn-primary" id="btnAddRow">+</button>
                        </td>
                      </tr>
                    </table>
                  </div>

                  <small class="text-danger" id="category-error-message"></small>
                  <small class="text-danger" id="alkes-error-message"></small>
                </div> 
              </div>
              <div class="card-footer text-right">
                  <button class="btn btn-primary px-3">
                    <i class="fas fa-paper-plane mr-1"></i>
                    Kirim Pengajuan
                  </button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection

@section('js-extends')
  <script src="{{ asset('js/order/table/order-table-fasyankes.js') }}"></script>
  <script src="{{ asset('js/forms/file-upload-form.js') }}"></script>
  <script src="{{ asset('js/order/external/fasyankes/form-submit-validation.js') }}"></script>
@endsection