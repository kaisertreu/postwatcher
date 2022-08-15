<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  {{-- multi language --}}
  <meta charset="utf-8">

  {{-- responsive display --}}
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- favicon icon --}}
  <link rel="icon" type="image/png" sizes="30x30" href="{{ asset('image/post-watcher.png') }}">

  <title>@yield('title')</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  {{-- bootstrap --}}
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

  <!-- custom stylesheet -->
  <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">

  @yield('css')
</head>

<body class="d-flex flex-column vh-100">
  {{-- div#app --}}
  <div id="app">
    @include('layouts.navbar')

    @include('layouts.message')

    <main class="py-4">
      <div class="container">
        @yield('breadcrumbs')
        @yield('content')
      </div>
    </main>
  </div>
  {{-- div#app end --}}

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded-circle" href="#app">
    <i class="bi bi-chevron-up"></i>
  </a>

  @include('layouts.footer')

  {{-- scripts --}}
  {{-- jquery + bootstrap js --}}
  <script src="{{ asset('js/app.js') }}"></script>
  {{-- don't put defer & async attribute in script
        - i.e <script src="" async defer>
        - reason for above conclusion:
            >https://laracasts.com/discuss/channels/laravel/uncaught-referenceerror-is-not-defined-at-10503?reply=462660 --}}

  <!-- Core plugin JavaScript-->
  <script src="{!! asset('js/jquery-easing/jquery.easing.min.js') !!}"></script>

  {{-- custom script --}}
  {{-- <script async src="{{ asset('js/main.js') }}" defer></script> --}}
  <script src="{{ asset('js/main.js') }}"></script>

  @yield('js')

</body>

</html>
