@extends('templates.auth')

@section('form-content')
<form method="POST" action="{{ route('register.store') }}">
    @csrf

    <div class="form-group">
        <label for="fasyenkes_name">Nama Fasyenkes</label>
        <input id="fasyenkes_name" type="text" class="form-control @error('fasyenkes_name') is-invalid @enderror" name="fasyenkes_name" tabindex="1" value="{{ old('fasyenkes_name') }}">
        @error('fasyenkes_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>  

    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" value="{{ old('email') }}">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <div class="d-block">
            <label for="password" class="control-label">Password</label>
        </div>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <div class="d-block">
          <label for="confirmation_password" class="control-label">Konfirmasi Password</label>
        </div>
        <input id="confirmation_password" type="password" class="form-control @error('confirmation_password') is-invalid @enderror" name="confirmation_password" tabindex="2">
        @error('confirmation_password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

    <div class="form-group text-right">
      <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
        Daftar
      </button>
    </div>

    <div class="mt-5 text-center">
      Sudah mempunyai akun? <a href="{{ route('login.index') }}">Login</a>
    </div>
</form>
@endsection