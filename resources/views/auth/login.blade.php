@extends('templates.auth')

@section('form-content')
@if (Session::has('success'))
  <div class="alert alert-success">{{ Session::get('success') }}</div>
@elseif(Session::has('error'))
  <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif
<form method="POST" action="{{ route('login.verify') }}">
    @csrf

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

    <div class="form-group text-right">
      <a href="auth-forgot-password.html" class="float-left mt-3">
        Lupa Password?
      </a>
      <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
        Login
      </button>
    </div>

    <div class="mt-5 text-center">
      Belum mempunyai akun? <a href="{{ route('register.index') }}">Daftar</a>
    </div>
</form>
@endsection