@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Pengajuan Eskternal</h1>
      <div class="section-header-breadcrumb">
        <a href="{{ route('yantek.account.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i>
            Tambah Akun
        </a>
      </div>
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
                      <th class="text-center" style="width: 15px">Aksi</th>
                      <th class="text-center" style="width: 220px">Fasyankes</th>
                      <th class="text-center" style="width: 80px">Kategori</th>
                      <th class="text-center" style="width: 130px">Kelas</th>
                      <th class="text-center" style="width: 80px">Tipe</th>
                      <th class="text-center" style="width: 180px">Kontak</th>
                      <th class="text-center">Alamat</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $index => $user)
                      <tr>
                        <td class="text-center align-middle">
                          {{ $index + 1 }}
                        </td>
                        <td>

                        </td>
                        <td>
                          {{ $user->fasyankes_name . ' ' . $user->province . ' ' . $user->city }}
                        </td>
                        <td class="text-center align-middle">
                          {{ $user->fasyankes_category->category_name }}
                        </td>
                        <td class="text-center align-middle">
                          {{ $user->fasyankes_class->class_name }}
                        </td>
                        <td class="text-center align-middle">
                          {{ $user->type }}
                        </td>
                        <td class="align-middle">
                          {{ $user->email }} <br>
                          {{ $user->phone }}
                        </td>
                        <td>
                          {{ $user->address }}
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