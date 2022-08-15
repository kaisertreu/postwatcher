<nav class="navbar navbar-expand-md navbar-light bg-gradient-primary shadow-sm">
  <div class="container">

    {{-- brand --}}
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{ asset('image/post-watcher.png') }}" width="30" height="30" class="d-inline-block align-top mx-1"
        alt="branding">
      <span class="px-2">{{ config('app.name') }}</span>
    </a>

    {{-- toggler dropdown for responsive display --}}
    <button class="navbar-toggler border-dark px-2" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="bi bi-filter-right h3"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">

      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
          <li class="nav-item">
            @if (!Request::is('login'))
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif
          </li>
          @if (Route::has('register'))
            <li class="nav-item">
              @if (!Request::is('register'))
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              @endif
            </li>
          @endif
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link font-weight-bolder text-right pr-2" href="#"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->firstname . ' ' . auth()->user()->lastname }}
              <i class="bi bi-chevron-down"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right text-right text-md-left" aria-labelledby="navbarDropdown">
              <a class="dropdown-item disabled" href="#">
                <i class="bi bi-person-fill mr-2"></i>
                Profile
              </a>
              <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="bi bi-box-arrow-right mr-2"></i>
                Logout
              </a>
              {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); $('#logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form> --}}
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>

@include('layouts.logout')
