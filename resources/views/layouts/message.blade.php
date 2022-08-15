{{-- SUCCESS message --}}
@if (Session::has('success'))
  <div class="container">
    <div class="alert alert-success border-left-success shadow py-2 mt-3 mb-0 mx-auto">
      <div class="row no-gutters align-items-center">
        <div class="col p-0">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
            Success Message:
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Session::get('success') }}</div>
        </div>
      </div>
    </div>
  </div>
@endif

{{-- default status message from home.blade --}}
{{-- @if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
@endif --}}
