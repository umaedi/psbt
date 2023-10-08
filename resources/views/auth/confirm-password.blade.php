@extends('layouts.app')
@section('content')
<section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand">
            <img src="{{ asset('dist') }}/img/logo-icomesh.png" alt="logo" width="100%" class="shadow-light">
          </div>

          @if (session('status'))
          <div class="alert alert-success">{{ session('status') }}</div>
          @endif
          <div class="card card-primary">
            <div class="card-header">
                <h4>CONFIRM PASSWORD</h4>
              </div>
            <div class="card-body">
              <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="form-group">
                  <label for="password">Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('email') }}" tabindex="1" required autofocus>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                  <button type="submit" id="btn" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    CONFIRM PASSWORD
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
