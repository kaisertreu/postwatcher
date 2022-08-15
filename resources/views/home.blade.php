@extends('layouts.app')

@section('title', $title)

@section('breadcrumbs')
  <h4>{{ $subtitle }}</h4>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
      <li class="breadcrumb-item" aria-current="page"></li>
    </ol>
  </nav>
@endsection

@section('content')
  {{-- 🔗 source: https://codepen.io/lesliesamafful/pen/oNXgmBG?editors=1100 --}}
  <div class="container-fluid">
    <div class="row m-0 p-0">
      <div class="col-12 mt-3 mb-1" style="cursor: pointer">
        <h4 class="text-uppercase">Example template cards</h4>
        <p>Statistics on minimal cards. <b>Click here to view</b></p>
      </div>
    </div>
    <div class="row m-0 p-0" style="display: none">
      <div class="col-xl-3 col-md-6 p-1">
        <div class="card bg-gradient-primary hover-bright">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="bi bi-pencil h1 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>278</h3>
                  <span>New Posts</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 p-1">
        <div class="card bg-gradient-warning hover-bright">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="bi bi-chat-left-dots h1 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>156</h3>
                  <span>New Comments</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 p-1">
        <div class="card bg-gradient-success hover-bright">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="bi bi-graph-up-arrow h1 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>64.89 %</h3>
                  <span>Bounce Rate</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 p-1">
        <div class="card bg-gradient-danger hover-bright">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="bi bi-geo-alt h1 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>423</h3>
                  <span>Total Visits</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- other card templates: 👇👇 --}}
  {{-- https://www.bootdey.com/snippets/view/bs4-card-widget#css --}}
  {{-- https://www.bootdey.com/snippets/view/Gradients-dashboard-cards#css --}}
  {{-- https://www.bootdey.com/snippets/view/bs4-Responsive-Dashboard-Menu-Cards --}}
  {{-- https://bbbootstrap.com/snippets/bootstrap-5-simple-card-hinging-effect-60698971 ❗❗❗ bootstrap 5 --}}

  <hr>

  {{-- 📝TBD: make a "reader mode" and "manager mode" --}}


  {{-- main content --}}
  <div class="row m-0 p-0">
    {{-- <div class="col-xl-3 col-md-6 p-1">
      <div class="card shadow bg-gradient-primary hover-bright position-relative">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="align-self-center">
                <i class="bi bi-book-half h1 float-left"></i>
              </div>
              <div class="media-body text-right">
                <h3>{{ $comics }}</h3>
                <a class="text-decoration-none text-body stretched-link" href="{{ route('comics.index') }}">
                  All Comic Series
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    <div class="col-xl-3 col-md-6 p-1">
      <div class="card shadow border-left-primary bg-white hover-on position-relative">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="align-self-center">
                <i class="bi bi-book-half text-primary h1 float-left"></i>
              </div>
              <div class="media-body text-right">
                <h3>{{ $comics }}</h3>
                <a class="text-decoration-none text-body stretched-link" href="{{ route('comics.index') }}">
                  All Comic Series
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
    // this is for the example template, nevermind this lol
    $('.container-fluid').click(function() {
      $('.container-fluid').children('.row:last').fadeToggle();
    });
  </script>
@endsection
