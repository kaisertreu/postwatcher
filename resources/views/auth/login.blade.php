@extends('layouts.app')

@section('title', 'Login | ' . config('app.name'))

@section('content')
  {{-- redesign the buttons and possibly the whole file --}}

  <div class="row justify-content-center">
    <div class="col-md-7">

      <h4 class="border-left-info rounded py-1 px-2">{{ __('Login') }}</h4>
      <hr class="my-3">

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
          <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

          <div class="col">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
              value="{{ old('email') }}" placeholder="example@dummy.ie" required autocomplete="email" autofocus>

            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

          <div class="col">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
              name="password" placeholder="secret" required autocomplete="current-password">

            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <div class="col offset-md-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>

              <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
              </label>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md offset-md-3">
            @if (Route::has('password.request'))
              <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
              </a>
            @endif
            <button type="submit" class="btn btn-primary btn-icon-split float-right">
              <span class="text py-0 px-3 align-self-center">{{ __('Login') }}</span>
              <span class="icon py-1 px-2">
                <span class="bi bi-box-arrow-in-right"></span>
              </span>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
