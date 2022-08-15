@extends('layouts.app')

@section('title', 'Register | ' . config('app.name'))

@section('content')
  <div class="row px-1 justify-content-center">

    <div class="col-md-7 px-1">
      <h4 class="border-left-info rounded py-1 px-3">{{ __('Register') }}</h4>
      <hr class="my-3">

      <form method="POST" action="{{ route('register') }}" class="col px-0">
        @csrf

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="firstname" class="col col-form-label px-0">First Name</label>

            <div class="col px-0">
              <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror"
                name="firstname" value="{{ old('firstname') }}" placeholder="Aa" required autocomplete="firstname"
                minlength="2" maxlength="255" autofocus>

              @error('firstname')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group col-md-6">
            <label for="lastname" class="col col-form-label px-0">Last Name</label>

            <div class="col px-0">
              <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                name="lastname" value="{{ old('lastname') }}" placeholder="Aa" required autocomplete="lastname"
                minlength="2" maxlength="255">

              @error('lastname')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col col-form-label px-0">{{ __('E-Mail Address') }}</label>

          <div class="col px-0">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
              value="{{ old('email') }}" placeholder="example@dummy.ie" required autocomplete="email">

            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="password" class="col col-form-label px-0">{{ __('Password') }}</label>

            <div class="col px-0">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" placeholder="secret" required autocomplete="new-password" minlength="8" maxlength="255">

              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group col-md-6">
            <label for="password-confirm" class="col col-form-label px-0">{{ __('Confirm Password') }}</label>

            <div class="col px-0">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                placeholder="secret" required autocomplete="new-password">
            </div>
          </div>
        </div>

        <div class="col row justify-content-end mx-auto mt-4 px-0">
          <button type="submit" class="btn btn-primary btn-icon-split mx-1">
            <span class="text py-0 px-3 align-self-center">{{ __('Register') }}</span>
            <span class="icon py-1 px-2">
              <span class="bi bi-person-plus-fill"></span>
            </span>
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
