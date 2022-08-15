<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- favicon icon --}}
  <link rel="icon" type="image/png" sizes="30x30" href="{{ asset('image/post-watcher.png') }}">

  <title>{{ config('app.name') }}</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

  {{-- bootstrap --}}
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

  <!-- custom stylesheet -->
  <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="m-0" style="">
  <div class="d-flex justify-content-center align-items-center position-relative vh-100 bg-gradient-primary"
    style="box-shadow: inset 0 0 5rem rgb(0 0 0 / 50%);">
    {{-- @if (Route::has('login'))
      <div class="top-right links">
        @auth
          <a href="{{ url('/home') }}">Home</a>
        @else
          <a href="{{ route('login') }}">Login</a>

          @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
          @endif
        @endauth
      </div>
    @endif --}}

    <div class="text-center">
      <div class="position-relative m-5 py-4 hover-on">
        <h1 class="row display-4 text-white m-0">
          <img src="{{ asset('image/post-watcher.png') }}" width="60" height="60" class="align-self-center mr-2"
            alt="branding">
          <p class="ml-2 mb-0">{{ config('app.name') }}</p>
        </h1>
        <a href="{{ route('home') }}" class="text-xs stretched-link text-decoration-none text-uppercase text-white">
          click here to
          @auth
            go home
          @else
            get started
          @endauth
        </a>
      </div>
    </div>

    {{-- <div class="text-center">
      @auth
        <div class="py-4 position-relative hover-on">
          <a href="{{ route('home') }}" class="display-1 stretched-link text-decoration-none text-body">
            {{ config('app.name') }}
          </a>
          <p class="text-xs text-uppercase font-weight-bold">click here to go home</p>
        </div>
      @else
        <div class="display-1 py-4">
          {{ config('app.name') }}
        </div>
      @endauth

      <div class="row m-0 p-2 text-uppercase justify-content-between font-weight-bolder">
        @if (Route::has('login'))
          @guest
            <a class="col hover-on text-decoration-none text-dark stretched-link p-3 m-2"
              href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
              <a class="col hover-on text-decoration-none text-dark stretched-link p-3 m-2"
                href="{{ route('register') }}">Register</a>
            @endif
          @endguest
        @endif
      </div>
    </div> --}}
  </div>
</body>

</html>
