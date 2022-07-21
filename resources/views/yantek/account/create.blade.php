@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Manajemen Akun</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Manajemen Akun Fasyankes</h2>
      <p class="section-lead">Pembuatan akun fasyankes yang digunakan untuk melakukan pengajuan layanan</p>

      <div class="row">
        <div class="col-12">
          @if (Session::has('success'))
              <div class="alert alert-success mb-2">{{ Session::get('success') }}</div>
          @elseif(Session::has('error'))
              <div class="alert alert-danger mb-2">{{ Session::get('error') }}</div>
          @endif
          <div class="card">
            <div class="card-header">
              <h4>Form Penambahan Akun Fasyankes</h4>
            </div>
            <form method="POST" action="{{ route('yantek.account.store') }}">
                @csrf
                <div class="card-body px-4 py-0">
                    <div class="row">
                        <div class="form-group col">
                            <label for="fasyankes_name">Nama Fasyankes</label>
                            <input type="text" class="form-control @error('fasyankes_name') is-invalid @enderror" name="fasyankes_name" id="fasyankes_name" value="{{ old('fasyankes_name') ?? '' }}" placeholder="Nama Lengkap Fasyankes">
                            @error('fasyankes_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="phone">Telepon</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? '' }}" placeholder="Nomor Telepon Fasyankes">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="type">Tipe</label>
                            <div class="ml-1 mt-2 row">
                                <div class="custom-control custom-radio col">
                                    <input name="type" value="Negeri" type="radio" id="type-a" class="custom-control-input @error('type') is-invalid @enderror"
                                    @if (old('type') != null)
                                        @if (old('type') == "Negeri") checked @endif
                                    @endif>
                                    <label class="custom-control-label" for="type-a">Negeri</label>
                                </div>
                                <div class="custom-control custom-radio col">
                                    <input name="type" value="Swasta" type="radio" id="type-b" class="custom-control-input @error('type') is-invalid @enderror"
                                    @if (old('type') != null)
                                        @if (old('type') == "Swasta") checked @endif
                                    @endif>
                                    <label class="custom-control-label" for="type-b">Swasta</label>
                                </div>
                            </div>
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="type">Kategori</label>
                            <select class="form-control selectric @error('class') is-invalid @enderror" name="category" id="category">
                                <option value="" selected hidden>Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if (old('category') != null)
                                            @if (old('category') == $category->id) selected @endif
                                        @endif>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('province')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="type">Kelas</label>
                            <select class="form-control selectric @error('class') is-invalid @enderror" name="class" id="class">
                                <option value="" selected hidden>Pilih Kelas</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}"
                                        @if (old('class') != null)
                                            @if (old('class') == $class->id) selected @endif
                                        @endif>
                                        {{ $class->class_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('province')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="type">Provinsi</label>
                            <select class="form-control selectric @error('province') is-invalid @enderror" name="province" id="province"></select>
                            @error('province')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="city">Kota</label>
                            <select class="form-control selectric @error('city') is-invalid @enderror" name="city" id="city">
                                <option value="" selected hidden>-</option>
                            </select>
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat Fasyankes</label>
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? '' }}" placeholder="Alamat Lengkap Fasyankes">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="pic">PIC</label>
                            <input type="text" class="form-control @error('pic') is-invalid @enderror" name="pic" id="pic" value="{{ old('pic') ?? '' }}" placeholder="Nama Lengkap PIC">
                            @error('pic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="pic_phone">Telepon PIC</label>
                            <input id="pic_phone" type="text" class="form-control @error('pic_phone') is-invalid @enderror" name="pic_phone" value="{{ old('pic_phone') ?? '' }}" placeholder="Nomor Telepon PIC">
                            @error('pic_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="email">Email</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? '' }}" placeholder="Email Fasyankes untuk Login">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                            <small class="text-danger">
                                * Password Harus Terdiri Minimal 8 Karakter
                            </small>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="c_password">Konfirmasi Password</label>
                            <input id="c_password" type="password" class="form-control @error('c_password') is-invalid @enderror" name="c_password">
                            <small class="text-danger">
                                * Konfirmasi Password Harus Sama Dengan Password
                            </small>
                            @error('c_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary px-3" type="submit">
                        <i class="fas fa-save mr-1"></i>
                      Simpan
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
  <script src="{{ asset('js/forms/dropdown-location-form.js') }}"></script>
@endsection