@extends('layouts.app')

@section('content')
<div class="container login-container">
    <div class="row">
      <div class="col-xl-8 m-auto col-sm-7 col-12">
        <div class="log-box">
          <div class="row align-items-center">
            <div class="col-md-5 log-img d-none d-sm-none d-md-block">
              <img src="img/img1.svg" class=" ml-3 img-responsive img-fluid" alt="...">
            </div>
            <div class="col-sm-12 col-md-7 col-xl-7 col-12 login-form">
              <div class="log-content">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="form-group">
                    @error('email')
                    <span class="login-invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                    <input type="text"  class="auth-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                    <label for="email" class="label-name">
                      <span class="content-name">Email</span>
                    </label>
                  </div>
                  <div class="form-group">
                    @error('password')
                    <span class="login-invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                    <input type="password" class="auth-input form-control @error('password') is-invalid @enderror mb-3" name="password">
                      <label for="password" class="label-name">
                        <span class="content-name">Hasło</span>
                      </label>
                  </div>

                  <button type="submit" class=" log-btn btn btn-primary form-control mb-4">Zaloguj</button>
                </form>
                <p><a href="{{ route('register') }}">Rejestracja</a></p>
                <p><a href="#">Reset hasła</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
