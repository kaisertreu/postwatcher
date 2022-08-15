@extends('layouts.app')

@section('title', $title)

@section('css')
  <style>
    .blink {
      animation: blinker 1250ms linear infinite;
    }

    @keyframes blinker {
      50% {
        opacity: 0;
      }
    }

    .rotate-90deg {
      transform: rotate(90deg);
      display: block;
    }

    .bleed-out {
      margin: 0 calc(50% - 50vw)
    }

    .rounded-pill-right {
      border-top-right-radius: 50rem !important;
      border-bottom-right-radius: 50rem !important;
    }

    .rounded-pill-left {
      border-top-left-radius: 50rem !important;
      border-bottom-left-radius: 50rem !important;
    }
  </style>
@endsection

@section('breadcrumbs')
  <h4>{{ $subtitle }}</h4>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href={!! route('home') !!} class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
    </ol>
  </nav>
@endsection

@section('content')
  {{-- sticky shit for new entry --}}
  {{-- <div class="row sticky-top float-right bleed-out">
    <button class="btn btn-secondary btn-lg rounded-pill-left">
      New <span class="bi bi-plus-circle pl-1"></span>
    </button>
  </div> --}}

  {{-- top bar --}}
  <div class="row justify-content-between mx-0 my-1">

    {{-- sort, filter, & add --}}
    <div class="col-md row align-items-center justify-content-between px-0 mx-0 py-1">

      {{-- sort & filter --}}
      <div class="row m-0">
        {{-- sort --}}
        <div class="dropdown">
          <button class="btn btn-primary btn-icon-split mx-1" data-toggle="dropdown" aria-expanded="false">
            <span class="icon py-1 px-2">
              <span class="bi bi-bar-chart-steps"></span>
            </span>
            <span class="text py-0 px-2 align-self-center">Sort</span>
          </button>
          <ul id="ul-sort" class="dropdown-menu text-decoration-none" role="button">
            <a class="sort-cat dropdown-item" data-query="id">ID</a>
            <a class="sort-cat dropdown-item disabled active" data-query="title">Title</a>
            <a class="sort-cat dropdown-item" data-query="rating">Rating</a>
            <a class="sort-cat dropdown-item" data-query="created_at">Date added</a>
            <a class="sort-cat dropdown-item" data-query="updated_at">Date edited</a>
            <li class="dropdown-divider"></li> <!-- .dropdown-divider -->
            <a class="sort-order dropdown-item disabled active px-2" data-query="asc">
              First to Last
              <span class="float-right text-muted">ASC <span class="bi bi-sort-down"></span></span>
            </a>
            <a class="sort-order dropdown-item px-2" data-query="desc">
              Last to First
              <span class="float-right text-muted">DESC <span class="bi bi-sort-up-alt"></span></span>
            </a>
          </ul>
        </div>

        {{-- filter --}}
        <div id="filter-accordion" class="accordion">
          <button class="btn btn-primary btn-icon-split mx-1" data-toggle="collapse" data-target="#filter-box"
            aria-expanded="true" aria-controls="filter-box">
            <span class="text py-0 px-2 align-self-center">Filter</span>
            <span class="icon py-1 px-2">
              <span class="bi bi-funnel"></span>
            </span>
          </button>
        </div>
      </div>

      {{-- add new entry --}}
      <a id="btn-add" href="{{ route('comics.create') }}" class="btn btn-dark btn-icon-split mx-1 float-right">
        <span class="icon py-1 px-2">
          <span class="bi bi-plus"></span>
        </span>
        <span class="text py-0 px-2 align-self-center">New</span>
      </a>

    </div>

    {{-- search box --}}
    <div class="col-md-4 align-self-center justify-content-center px-0 py-1">
      <div class="input-group">
        <input type="search" name="search-title" id="search-title" class="form-control border-right-0"
          placeholder="Search title here...">
        {{-- #search-title --}}
        <div class="input-group-append border-left-0">
          <span class="input-group-text bg-white">
            <span class="bi bi-search"></span>
          </span>
        </div>
      </div>
    </div>
  </div>

  {{-- accordion: filter --}}
  <div id="filter-box" class="row align-items-center justify-content-center mx-auto collapse"
    data-parent="#filter-accordion">
    <div class="card-body border my-0 mx-auto rounded-bottom py-2">
      <div class="alert alert-info border-left-info alert-dismissible my-2 fade show" role="alert">
        <div class="row m-0">
          <p class="alert-heading m-0"><i class="bi bi-lightbulb-fill text-warning"></i> Quick Tips:</p>
          <p class="text-muted my-0 mx-2">click the tags to be removed from the list and vice versa</p>
        </div>
        <p class="text-muted m-0">
          <b>Pattern:</b>
          <span class="badge badge-primary align-items-center font-weight-normal py-1 mx-2">
            <span class="p-1">Added</span>
            <b class="px-1">−</b>
          </span>
          <span class="badge badge-secondary align-items-center font-weight-normal py-1 mx-2">
            <span class="p-1">Removed</span>
            <b class="px-1">+</b>
          </span>
        </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="my-2">
        <p class="lead mx-0 my-2 font-weight-bold align-items-center">
          <i class="bi bi-globe mr-2"></i>
          <span class="text">Websites:</span>
          <button class="btn btn-primary btn-sm btn-icon-split float-right toggle-activity"
            onclick="toggle_activity(this)">
            <span class="text-capitalize py-0 px-2 align-self-center">Deactivate all</span>
            <b class="icon py-1 px-2">−</b>
          </button>
        </p>
        <div class="card w-100 m-0 border">
          {{-- <div id="web-populate" class="card-body p-1 row m-0"></div> --}}
          <div id="web-populate" class="card-body p-1 row m-0">
            @foreach ($sites as $site)
              <span class="badge badge-primary align-items-center hover-bright font-weight-normal py-1 m-1" role="button"
                onclick='filter_change(this)'>
                <span class="text-capitalize active p-1"
                  data-wid="{{ $site->id }}">&commat;{{ explode('.', $site->url)[0] }}</span>
                <b class="px-1">−</b>
              </span>
            @endforeach
          </div>
        </div>
      </div>
      <div class="my-2">
        <p class="lead mx-0 my-2 font-weight-bold align-items-center">
          <i class="bi bi-eye mr-2"></i>
          <span class="text">Reading Status:</span>
          <button class="btn btn-primary btn-sm btn-icon-split float-right toggle-activity"
            onclick="toggle_activity(this)">
            <span class="text-capitalize py-0 px-2 align-self-center">Deactivate all</span>
            <b class="icon py-1 px-2">−</b>
          </button>
        </p>
        <div class="card w-100 m-0 border">
          <div id="status-populate" class="card-body p-1">
            @php
              $state = ['Reading', 'Stacked', 'Completed', 'Plan To Read', 'On Hold', 'Dropped'];
            @endphp
            @foreach ($state as $row)
              <span class="badge badge-primary align-items-center hover-bright font-weight-normal py-1 m-1"
                role="button" onclick='filter_change(this)'>
                <span class="text-capitalize active p-1">{{ $row }}</span>
                <b class="px-1">−</b>
              </span>
            @endforeach
            {{-- for reading mode 👇👇 --}}
            {{-- <span class="badge badge-danger align-items-center hover-bright font-weight-normal py-1 m-1" role="button"
              onclick='($(this).children("b").text()==="−"? $(this).children("b").text("+").parent().removeClass("badge-success").addClass("badge-danger"): $(this).children("b").text("−").parent().removeClass("badge-danger").addClass("badge-success"))'>
              <span class="text-capitalize p-1">Stacked</span>
              <b class="px-1">+</b>
            </span>
            <span class="badge badge-danger align-items-center hover-bright font-weight-normal py-1 m-1" role="button"
              onclick='($(this).children("b").text()==="−"? $(this).children("b").text("+").parent().removeClass("badge-success").addClass("badge-danger"): $(this).children("b").text("−").parent().removeClass("badge-danger").addClass("badge-success"))'>
              <span class="text-capitalize p-1">Plan To Read</span>
              <b class="px-1">+</b>
            </span>
            <span class="badge badge-danger align-items-center hover-bright font-weight-normal py-1 m-1" role="button"
              onclick='($(this).children("b").text()==="−"? $(this).children("b").text("+").parent().removeClass("badge-success").addClass("badge-danger"): $(this).children("b").text("−").parent().removeClass("badge-danger").addClass("badge-success"))'>
              <span class="text-capitalize p-1">On Hold</span>
              <b class="px-1">+</b>
            </span>
            <span class="badge badge-danger align-items-center hover-bright font-weight-normal py-1 m-1" role="button"
              onclick='($(this).children("b").text()==="−"? $(this).children("b").text("+").parent().removeClass("badge-success").addClass("badge-danger"): $(this).children("b").text("−").parent().removeClass("badge-danger").addClass("badge-success"))'>
              <span class="text-capitalize p-1">Completed</span>
              <b class="px-1">+</b>
            </span>
            <span class="badge badge-danger align-items-center hover-bright font-weight-normal py-1 m-1" role="button"
              onclick='($(this).children("b").text()==="−"? $(this).children("b").text("+").parent().removeClass("badge-success").addClass("badge-danger"): $(this).children("b").text("−").parent().removeClass("badge-danger").addClass("badge-success"))'>
              <span class="text-capitalize p-1">Dropped</span>
              <b class="px-1">+</b>
            </span> --}}
          </div>
        </div>
      </div>
      <div class="my-2">
        <p class="lead m-0 font-weight-bold">
          <span class="bi bi-star mr-2"></span>
          <span class="text">Rating:</span>
        </p>
        <div class="card w-100 m-0 border">
          <div class="card-body p-1 text-muted">
            @for ($ktr = 1; $ktr <= 5; $ktr++)
              <span role="button" id="star-rating{{ $ktr }}"
                class="bi bi-star-fill hover-bright star-rating {{ $ktr == 5 ? 'active ' : null }}text-warning m-1"
                data-rate="{{ $ktr }}"></span>
            @endfor
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- results of top bar --}}
  <div class="row alert alert-info border-left-info p-0 mx-0 my-1">

    {{-- default badge --}}
    <div id="default-badge" class="row align-items-center p-0 m-0">
      <span class="badge badge-info rounded-pill-right pl-2 pr-4 py-2 m-0">Default</span>
    </div>

    {{-- sort box: result --}}
    <div class="row align-items-center px-2 my-1 mx-3">
      Sorted by:
      <span class="badge badge-dark font-weight-normal py-2 m-1">
        <span id="sort-cat-text" class="text-capitalize px-1">Title</span>
      </span>
      <span class="badge badge-dark font-weight-normal py-2 m-1">
        <span id="sort-ord-text" class="text-capitalize px-1">Ascending</span>
      </span>
    </div>

    {{-- filter box: result --}}
    <div class="row align-items-center px-2 my-1 mx-3">
      Filters:
      <div id="filter-web-text" class="row m-0 p-0">
        <span class="badge badge-dark font-weight-normal py-2 m-1">
          <i class="bi bi-globe"></i>
          <span class="text-capitalize px-1">All</span>
        </span>
      </div>
      <div id="filter-status-text" class="row m-0 p-0">
        <span class="badge badge-dark font-weight-normal py-2 m-1">
          <i class="bi bi-eye-fill"></i>
          <span class="text-capitalize px-1">All</span>
        </span>
      </div>
      <div>
        <span class="badge badge-dark font-weight-normal py-2 m-1">
          <i class="bi bi-star-fill"></i>
          <span id="filter-rate-text" class="text-capitalize px-1">5</span>
        </span>
      </div>
    </div>
  </div>

  {{-- loading screen --}}
  <div id="loading-screen" class="row align-items-center justify-content-center sticky-top">
    <div class="bg-secondary rounded-lg-bottom px-5 py-5">
      <span class="h1">
        Loading...</span><span class="spinner-border mx-3" role="status">
      </span>
    </div>
  </div>

  {{-- templates 👇👇 --}}
  <div>
    <div class="col-sm-4 mb-2 px-0 template-card hidden">
      <div class="card color-border shadow-sm h-100 m-1">
        {{-- find() ☝☝ for color --}}
        <div class="card-header bg-transparent border-0 justify-content-start align-items-center m-0 px-1 py-0">
          <span class="badge badge-dark font-weight-light m-0 py-1">
            <span class="bi bi-record-fill mr-1 color-badge p-0"></span>
            {{-- find() ☝☝ for status --}}
            {{-- find() 👈👈 for color --}}
          </span>
          <span class="badge badge-dark font-weight-light web-badge text-capitalize m-0 py-1 px-1">
            {{-- find() ☝☝ for webname --}}
            {{-- <span class="bi bi-at m-0 p-0"></span> --}}
          </span>
        </div>
        <div class="card-body pt-4 pb-0 mx-auto text-center">
          <a href="#" target="_blank"
            class="title-text text-body text-wrap text-decoration-none font-weight-bolder h3 m-0">
            {{-- find() ☝☝ for url --}}
            {{-- find() 👈👈 for title --}}
          </a>
        </div>
        <div class="card-footer bg-transparent border-0 px-4 py-3">
          <div class="row align-items-center mx-auto p-1">
            <div class="col p-0 m-auto lead">
              <span class="bi bi-star mr-1 rate-text"></span>
              {{-- find() ☝☝ for rate --}}
            </div>
            <div class="col p-0 note-check">
              {{-- find() ☝☝ for notes --}}
              <div class="dropdown float-right">
                <button class="btn color-btn btn-sm btn-icon-split p-0" data-toggle="dropdown" aria-expanded="false">
                  <span class="text">See Notes</span>
                  <span class="icon">
                    <span class="bi bi-sticky"></span>
                  </span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right note-populate">
                </ul>
              </div>
            </div>
          </div>
          <div class="col px-4 pb-4 pt-2 mt-2">
            <div class="d-flex justify-content-center">
              <span class="m-0 lead">Chapter</span>
            </div>
            <div class="row align-items-center justify-content-center m-0 p-0">
              <h1 role="button" class="font-weight-bolder p-0 m-0 current-chapter"></h1>
              {{-- find() ☝☝ for chapter --}}
              <form method="POST" class="m-0 p-0 btn-group-vertical"></form>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- <span class="badge badge-dark hover-bright font-weight-normal py-2 m-1 template-badge hidden">
        <span class="px-1 text-capitalize badge-title"></span>
        <span class="text-muted px-1 badge-close font-weight-bolder" role="button"
          onclick='$(this).parent().fadeOut("fast","swing", function() { $(this).remove(); });'>&times;</span>
      </span>

      <span class="badge badge-dark hover-bright font-weight-normal py-2 m-1" role="button"
        onclick='$(this).fadeOut("fast","swing", function() { $(this).remove(); });'>
        <span class="text-capitalize px-1 lead">
          <span class="bi bi-record-fill text-primary"></span>
          Reading
        </span>
        <span class="text-muted px-1 font-weight-bolder lead">&times;</span>
      </span> --}}
    <div class="template-badge hidden">
      <span class="badge badge-success align-items-center hover-bright font-weight-normal py-1 m-1" role="button"
        onclick='filter_change(this)'>
        <span class="text-capitalize active badge-title p-1">Templatescans</span>
        <b class="px-1">−</b>
      </span>
    </div>
    <div class="template-chip hidden">
      <span class="badge badge-dark font-weight-normal py-2 m-1">
        <i class="bi bi-globe"></i>
        <span class="text-capitalize px-1">All</span>
        <b></b>
      </span>
    </div>
  </div>
  {{-- templates ☝☝ --}}

  {{-- main content --}}
  <div id="entry-collection" class="row justify-content-center px-2 my-2">
  </div>

  {{-- bottom bar --}}
  <div class="row mx-auto justify-content-between">

    {{-- display total entries --}}
    <div class="col-md row lead align-items-center justify-content-center justify-content-md-start p-0 m-0">
      <!-- on medium-below screen, content is centered, else, content is aligned left -->
      Displaying
      <span id="counter" class="mx-2">__ / __</span>
      {{-- make this ☝☝☝ a badge?🤔🤔🤔 --}}
      entries
    </div>

    {{-- load more --}}
    <div class="col-md row align-items-center justify-content-center justify-content-md-center px-0 mx-auto my-1">
      <!-- on medium-below screen, content is centered, else, content is centered -->
      <button id="load-more" class="btn btn-primary btn-lg btn-block btn-icon-split justify-content-between p-0">
        <span class="icon">
          <span class="bi bi-chevron-double-down"></span>
        </span>
        <span class="text align-self-center">Load more</span>
        <span class="icon">
          <span class="bi bi-chevron-double-down"></span>
        </span>
      </button>{{-- button #load-more --}}
    </div>

    {{-- empty --}}
    <div class="col-md row align-items-center justify-content-center justify-content-md-end px-0 mx-auto my-1">
      <!-- on medium-below screen, content is centered, else, content is aligned right -->
      {{-- PLACEHOLDER --}}
      {{-- idk what to put here tbh 😔😞 --}}
    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('js/comics/index.js') }}"></script>
  <script>
    var g_page = 1;

    // web_names();
    generate_entries();
    // done_loading();

    // 📝 TO-DO:
    // Put a `toggle all active/inactive` in filter's website and reading status rows
    // don't forget to do the filter result display!!                                [✔ DONE ✔]

    /* instead of making a two display of accepted and rejected badges,just manipulate the bg color
     * and "close" icon into minus and plus. */ //                        👈👈👈👈  [✔ DONE ✔]

    //disable other event listeners when the generate_entries() is loading
    //https://medium.com/@leticia.rop/how-to-prevent-multiple-ajax-calls-from-firing-on-repeated-clicks-a3256835aef
    //https://www.raymondcamden.com/2015/04/03/strategies-for-dealing-with-multiple-ajax-calls
    //make a function is_loading() and put every selector disabling function there   [✔ DONE ✔]
    // also done_loading() for the selector disabling-removal shiz                   [✔ DONE ✔]

    //make a function for [btn]see more[btn] and [btn]chapter[btn] so that only the specific card that was clicked
    //will only spawn a dropdown
    //[btn]see more[btn] ✔✔✔
    //[btn]chapter[btn]  ✔✔✔

    /* $('#web-populate').children().children('span').not('.active').toArray().map((value) => {
      return $(value).text().toLowerCase().replace(/\b[a-z]/g, (letter) => {
        return letter.toUpperCase(); //basically ucwords(strtolower($letter)) if in php
      });
    });

      $('#status-populate').children().children('span').not('.active').toArray().map((value) => {
        return $(value).html();
      }) */ //purpose of this is that i wanna check how to isolate the ones that doesn't have .active class [✔ DONE ✔]
    // 💡 try this 👉👉 https://stackoverflow.com/a/4521695

    function generate_entries(p_page) {
      is_loading();
      $.ajax({
        method: 'GET',
        url: "{!! route('api.comics.index') !!}",
        dataType: 'json',
        data: {
          search: $('#search-title').val(),
          page: p_page,
          sort_column: $('.sort-cat.active').data('query'),
          sort_order: $('.sort-order.active').data('query'),
          filter_urls: $('#web-populate').children().children('.active').toArray().map((value) => {
            return $(value).data('wid'); //if #web-populate is an ajax call, three .children(). else, just two.
          }),
          filter_status: $('#status-populate').children().children('.active').toArray().map((value) => {
            return $(value).text();
          }),
          filter_rating: $('.star-rating.active').data('rate')
        },
        success: async (data) => {
          data_array = data.comics.data;
          $('#counter').text(`${data.comics.to} / ${data.comics.total}`); //need to be here

          if (!Array.isArray(data_array) || !data_array.length || data_array === null) {
            $("#entry-collection").html('<div class="h3 blink mt-3">No Record Found</div>');
            $('#counter').text('N/A');
            $("#load-more").addClass('disabled').attr('tabindex', '-1').hide();
          } else {
            for (const row of data_array) {
              $('#entry-collection').append(html_card(row)); //displaying template card here
            }
          }

          done_loading();
          // done_loading() has #load-more.removeClass('disabled') but no .hide();

          if (data.comics.last_page <= 1) {
            $("#load-more").addClass('disabled').attr('tabindex', '-1').hide();
          }
          // (p_page >= data.comics.last_page || data.comics.last_page === 1) //contemplate on this
        },
        error: (jqXHR, textStatus, errorThrown) => {
          console.log(jqXHR); //jqxHR is an object
          console.log(jqXHR.status); //jqXHR.status = error type (i.e. 404??)
          console.log(textStatus); //textStatus =  error status (i.e.: timeout)
          console.log(errorThrown); //errorThrown = (i.e.: internal server error)
          let error_output = '<div class="h3 mt-3 bg-warning rounded-lg p-2">' +
            '<span class="bi bi-exclamation-octagon-fill mr-3 blink"></span>' + jqXHR.status + ' | ' + errorThrown +
            '<span class="bi bi-exclamation-octagon-fill ml-3 blink"></span></div>';

          $("#ul-sort a").addClass('disabled').attr('tabindex', '-1');
          $('#search-title').attr('disabled', 'disabled');
          $('#loading-screen').hide();
          $('#counter').html("N/A");
          $("#entry-collection").html(error_output);
        }
      });
    }

    /* function web_names() { //https://stackoverflow.com/q/4566042 👈👈 check this out
      $.ajax({
        method: 'GET',
        url: "{!! route('api.sites.index') !!}",
        dataType: 'json',
        success: async function(data) {
          //   console.log(data);
          let site_array = data.sites;

          for (let row of site_array) {
            let id = row.id,
              url = row.url;

            let template = $(".template-badge").clone()
              .attr('class', 'plated-badge')
              .removeClass('hidden');

            template.find('.badge-title').text(`@${url}`).attr('data-wid', id);

            $('#web-populate').append(template);
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(jqXHR); //jqxHR is an object
          console.log(jqXHR.status); //jqXHR.status = error type (i.e. 404??)
          console.log(textStatus); //textStatus =  error status (i.e.: timeout)
          console.log(errorThrown); //errorThrown = (i.e.: internal server error)

          let error_output =
            `<div class="h3 bg-warning rounded-lg row justify-content-center align-items-center px-2"><span class="bi bi-exclamation-octagon-fill mr-3 blink py-2"></span>${jqXHR.status} | ${errorThrown}`;

          $('#web-populate').append(error_output);
        }
      });
    } */

    function chapter_update(url, value, _id) {
      $.ajax({
        method: 'POST',
        url: url,
        dataType: 'json',
        data: {
          _token: "{{ csrf_token() }}"
        },
        success: async () => {
          //success message here
          $(`#ch${_id}`).text(value);

          done_updating(_id);
        },
        error: (jqXHR, textStatus, errorThrown) => {
          console.log(jqXHR); //jqxHR is an object
          console.log(jqXHR.status); //jqXHR.status = error type (i.e. 404??)
          console.log(textStatus); //textStatus =  error status (i.e.: timeout)
          console.log(errorThrown); //errorThrown = (i.e.: internal server error)
          $(`#ch${_id}`).text("###").addClass('text-danger');
          is_updating(_id);
        }
      });
    }

    //sort by
    $('#ul-sort a').click((e) => {
      e.stopPropagation(); // to stop dropdown from closing after selecting 1 item
      e.preventDefault(); // to stop anchor tag to reload the page;

      let for_query = $(this).data('query'); // get the value for `for_query`
      if (for_query === 'asc' || for_query === 'desc') {
        $('.sort-order').removeClass('disabled active').removeAttr('tabindex');
      } else {
        $('.sort-cat').removeClass('disabled active').removeAttr('tabindex');
      }
      $(this).addClass('disabled active').attr('tabindex', '-1');

      let category_text = $('.sort-cat.active').text();
      let order_text = $('.sort-order.active').text();
      if (/asc/i.test(order_text)) { //checks if `order_text` contains case-insensitive(i) of "asc"
        order_text = 'Ascending'; //rewrites `order_text` value for displaying purposes
      } else {
        order_text = 'Descending';
      }

      /* if ($('#default-badge')) { // if #default-badge exists
        $('#default-badge').fadeOut("fast", "swing", function() {
          $(this).remove(); //removes the default badge
        });
      } */
      console.log($('.sort-cat.active').data('query'));
      console.log($('.sort-order.active').data('query'));

      $('#sort-cat-text').text(category_text);
      $('#sort-ord-text').text(order_text);

      $('#entry-collection').empty();
      g_page = 1;

      generate_entries(g_page);
    });

    //filter: websites & reading status
    function filter_change(_this) {
      if ($(_this).children("b").text() === "+") { //if removed
        html_filter($(_this).children("span").addClass("active"), "−", "badge-secondary", "badge-primary"); //add it
      } else { //otherwise
        html_filter($(_this).children("span").removeClass("active"), "+", "badge-primary", "badge-secondary"); //remove it
      }

      let result = $(_this).children('span').text();
      //   console.log(`includes @?: ${result.includes('@')}`);
      const emptemplate = $(".template-chip").clone().attr('class', 'plated-chip').removeClass('hidden');

      if (result.includes('@')) { //display web names here
        $('#filter-web-text').empty()
        let webpop = $('#web-populate').children().children('span').not('.active').toArray();

        if (!Array.isArray(webpop) || !webpop.length || webpop === null) {
          emptemplate.children().children('span').text('All');

          $('#filter-web-text').append(emptemplate);
        } else {
          webpop.map((value) => {
            if (webpop.length === $('#web-populate').children().children('span').toArray().length) {
              emptemplate.children().children('i').removeAttr('class').addClass('bi bi-globe').siblings('span')
                .text('All').siblings("b").text("−");
              return $('#filter-web-text').append(emptemplate);
            }

            const template = $(".template-chip").clone().attr('class', 'plated-chip').removeClass('hidden');

            template.children().children('span').text($(value).text().toLowerCase().replace(/\b[a-z]/g,
              (letter) => {
                return letter.toUpperCase(); /* ucwords(strtolower($letter)) */
              }).substring(1)).siblings('b').text('−');

            return $('#filter-web-text').append(template);
          });
        }
      } else if (!(result.includes('@'))) { //display status here
        $('#filter-status-text').empty()
        let statuspop = $('#status-populate').children().children('span').not('.active').toArray();

        if (!Array.isArray(statuspop) || !statuspop.length || statuspop === null) {
          emptemplate.children().children('i').removeAttr('class').addClass('bi bi-eye-fill').siblings('span')
            .text('All');
          $('#filter-status-text').append(emptemplate);

          //$('#status-populate').parent().siblings('p').children('button')
          //manipulate the button here
        } else {
          statuspop.map((value) => {
            if (statuspop.length === $('#status-populate').children().children('span').toArray().length) {
              emptemplate.children().children('i').removeAttr('class').addClass('bi bi-eye-fill').siblings('span')
                .text('All').siblings("b").text("−");
              return $('#filter-status-text').append(emptemplate);
            }

            const template = $(".template-chip").clone().attr('class', 'plated-chip').removeClass('hidden');

            template.children().children('i').removeAttr('class').addClass('bi bi-eye-fill').siblings('span')
              .text($(value).text()).siblings('b').text('−');

            return $('#filter-status-text').append(template);
          });
        }
      }
      //   console.log(`this: ${result}`);

      /* if ($('#default-badge')) { // if #default-badge exists
        $('#default-badge').fadeOut("fast", "swing", function() {
          $(this).remove(); //removes the default badge
        });
      } */

      $('#entry-collection').empty();
      g_page = 1;

      generate_entries(g_page);
    }

    function toggle_activity(_this) {
      // $('.toggle-activity').parent().next().children() //to access #status-populate and #web-populate
      // $(this).parent().next().children().children().children('.active').toArray().map((value) => {
      //   return console.log($(value));
      // });

      let result = $(_this).parent().next().children().children('span').text();
      const emptemplate = $(".template-chip").clone().attr('class', 'plated-chip').removeClass('hidden');

      if (result.includes('@')) { //display web names here
        $('#filter-web-text').empty()

        if (/deac/i.test($(_this).text())) {
          html_filter($(_this).children('span').text('activate all'), "+", "btn-primary", "btn-secondary");

          $('#web-populate').children().children('.active').toArray().map((value) => {
            return html_filter($(value).removeClass("active"), "+", "badge-primary", "badge-secondary");
          });

          emptemplate.children().children('i').removeAttr('class').addClass('bi bi-globe').siblings('span')
            .text('All').siblings('b').text('−');
        } else {
          html_filter($(_this).children('span').text('deactivate all'), "−", "btn-secondary", "btn-primary");

          $('#web-populate').children().children('span').not('.active').toArray().map((value) => {
            return html_filter($(value).addClass("active"), "−", "badge-secondary", "badge-primary");
          });

          emptemplate.children().children('i').removeAttr('class').addClass('bi bi-globe').siblings('span')
            .text('All').siblings('b').empty();
        }

        $('#filter-web-text').html(emptemplate);
      } else if (!(result.includes('@'))) { //checks if the data contains "@"
        $('#filter-status-text').empty() //resets the collection

        if (/deac/i.test($(_this).text())) { //checks if _this contains "deac"
          html_filter($(_this).children('span').text('activate all'), "+", "btn-primary", "btn-secondary");
          //change the button text from "deactivate all" to "activate all"

          $('#status-populate').children().children('.active').toArray().map((value) => {
            return html_filter($(value).removeClass("active"), "+", "badge-primary", "badge-secondary");
          }); //change the non-active classes to active

          emptemplate.children().children('i').removeAttr('class').addClass('bi bi-eye-fill').siblings('span')
            .text('All').siblings('b').text('−');
        } else {
          html_filter($(_this).children('span').text('deactivate all'), "−", "btn-secondary", "btn-primary");

          $('#status-populate').children().children('span').not('.active').toArray().map((value) => {
            return html_filter($(value).addClass("active"), "−", "badge-secondary", "badge-primary");
          });

          emptemplate.children().children('i').removeAttr('class').addClass('bi bi-eye-fill').siblings('span')
            .text('All').siblings('b').empty();
        }

        $('#filter-status-text').html(emptemplate);
      }

      $('#entry-collection').empty();
      g_page = 1;

      generate_entries(g_page);
    }

    //filter: rating
    $('.star-rating').click(() => {
      //   console.log(`rate: ${$(this).data('rate')}`);
      $('.star-rating').removeClass('active');
      $('.star-rating').removeClass('text-warning');

      let rate = $(this).data('rate');
      for (let ktr = 1; ktr <= rate; ktr++) {
        $(`#star-rating${ktr}`).addClass('text-warning');
      }
      $(this).addClass('active');
      $('#filter-rate-text').text(rate); //setting the filter's text for rate
      //   console.log($('.star-rating.active').data('rate')); //this is what you put in the function argument

      $('#entry-collection').empty();
      g_page = 1;

      generate_entries(g_page);
    });

    //search bar
    $('#search-title').keyup(delay(() => {
      $('#entry-collection').empty();
      g_page = 1;

      generate_entries(g_page);
    }, 750));

    //load more
    $('#load-more').click(() => {
      g_page++;

      generate_entries(g_page);
    });

    //see more
    function getNotes(notes, _id) {
      if ($(`#note${_id}`).parent().find(".note-populate").html() === '') {
        // $(".note-populate").empty(); //making sure it's empty but it doesn't work

        for (const note of JSON.parse(JSON.parse(decodeURIComponent(notes)))) {
          $(`#note${_id}`).parent().find(".note-populate")
            .append(
              `<li class="dropdown-item-text pr-2"><span class="bi bi-arrow-return-right  mr-1"></span> ${note}</li>`);
        }
      }
      // else {
      //   $(`#note${_id}`).parent().find(".note-populate").empty();
      // }
    }

    function getChapterControls(_id) {
      // if ($('form.btn-group-vertical').html() !== '') {
      //   $(this).fadeOut("fast", "swing", function() {
      //     $(this).empty();
      //     $(this).prev().removeClass('blink');
      //   }); // for resetting all control buttons but it doesn't work when it's inside fadeOut() lmao
      // }     // doesn't also work when this code block is outside the if statement below smh

      if ($(`#ch${_id}`).next().html() === '') {
        $('form.btn-group-vertical').empty().prev().removeClass('blink'); //for resetting all control buttons

        $(`#ch${_id}`).next().fadeIn(500, "swing")
          .html(
            `<button id="ctrlup${_id}" name="ctrlup${_id}" type="button" class="btn btn-link text-decoration-none m-0 py-0 ctrl-btn${_id}" onclick="setChapterUp(\'${_id}\')"><b class="h3 m-0 px-1 rotate-90deg">&#10094;</b></button><button id="ctrldown${_id}" name="ctrldown${_id}" type="button" class="btn btn-link text-decoration-none m-0 py-0 ctrl-btn${_id}" onclick="setChapterDown(\'${_id}\')"><b class="h3 m-0 px-1 rotate-90deg">&#10095;</b></button>`
          );
        $(`#ch${_id}`).addClass('blink');
      } else {
        $(`#ch${_id}`).next().fadeOut("fast", "swing", () => {
          $(`#ch${_id}`).next().empty();
          $(`#ch${_id}`).removeClass('blink');
        });
      }
    }

    function setChapterUp(_id) {
      let result = parseInt($(`#ch${_id}`).text()) + 1;

      is_updating(_id);
      let url = `api/comics/${_id}/update-chapter-plus`;
      chapter_update(url, result, _id);
    }

    function setChapterDown(_id) {
      let result = parseInt($(`#ch${_id}`).text()) - 1;

      is_updating(_id);
      let url = `api/comics/${_id}/update-chapter-minus`;
      chapter_update(url, result, _id);
    }

    //adding new
    $('#btn-add').click(function() {
      is_loading(); //lmao
    });
  </script>
@endsection
