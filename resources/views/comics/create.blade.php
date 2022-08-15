@extends('layouts.app')

@section('title', $title)

@section('css')
  <style>
    .custom-list {
      height: calc(100vh - 3.75rem);
    }
  </style>
@endsection

@section('breadcrumbs')
  <h4>{{ $subtitle }}</h4>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href={!! route('home') !!} class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item"><a href={!! route('comics.index') !!} class="text-decoration-none">Library</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
    </ol>
  </nav>
@endsection

@section('content')
  {{-- template --}}
  <div class="d-none">
    <label for="name" class="form-label">Document Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
      placeholder="Aa" maxlength="255">
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="form-row d-none">
    <div class="col-md my-1">
      <label for="name" class="form-label">Document Name</label>
      <input type="text" name="name" class="form-control" id="name" placeholder="Aa" maxlength="255">
    </div>
    <div class="col-md-4 my-1">
      <label for="fee" class="form-label">Document Fee (Only accepts two decimal points)</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><b>&#8369;</b></span>
        </div>
        <input type="number" name="fee" class="form-control" id="fee" min="0" max="999999999"
          step="0.01" placeholder="999,999,999">
      </div>
    </div>
  </div>

  {{-- main content --}}
  <div class="row mb-4">
    <form method="POST" action="{{ route('comics.store') }}" class="col-12">
      @csrf
      <div class="alert alert-warning border-left-warning">
        <h5>don't forget to put a live search on title.</h5>
        source(s):
        <ul>
          <li class="text-truncate">
            https://www.youtube.com/watch?v=fA4IhJEaSSY&list=PLxl69kCRkiI0rS3u_4hFDA1nyqol4MMZe&index=18</li>
          <li class="text-truncate">
            https://www.youtube.com/watch?v=ld5HwiENA8k&list=PLxl69kCRkiI0rS3u_4hFDA1nyqol4MMZe&index=18</li>
          <li class="text-truncate">
            https://www.youtube.com/watch?v=D4ny-CboZC0&list=PLxl69kCRkiI0rS3u_4hFDA1nyqol4MMZe&index=21</li>
        </ul>
      </div>
      <div>
        <div class="form-row">
          <label for="title" class="col-sm-2 col-form-label">
            Title
            <sup class="badge badge-danger">Required</sup>
          </label>
          <div class="col-sm-10">
            <input type="text" name="title" id="title" class="form-control" placeholder="Aa" required autofocus>
          </div>
        </div>
        <div class="my-3"></div>
        <div class="col-md mh-25 px-0">
          {{-- 👇👇 https://jsfiddle.net/davidliang2008/9kfdwjgx/ --}}
          <div class="card" style="height: calc(250px - 3.5rem);">
            <div class="card-header">
              <strong>Similar Questions</strong>
            </div>
            <ul class="list-group overflow-auto">
              <li class="list-group-item">
                <span class="bi bi-arrow-return-right pr-2"></span><span class="innerhtml">test</span>
                <span class="badge badge-danger rounded-pill float-right px-2" role="button"
                  onclick='$(this).parent().fadeOut("fast","swing", function() { $(this).remove(); $("#prevn${ktr}").remove(); $("#checker${ktr}").remove(); });'>
                  Remove</span>
              </li>
              <li class="list-group-item">
                <span class="bi bi-arrow-return-right pr-2"></span><span class="innerhtml">test</span>
                <span class="badge badge-danger rounded-pill float-right px-2" role="button"
                  onclick='$(this).parent().fadeOut("fast","swing", function() { $(this).remove(); $("#prevn${ktr}").remove(); $("#checker${ktr}").remove(); });'>
                  Remove</span>
              </li>
              <li class="list-group-item">
                <span class="bi bi-arrow-return-right pr-2"></span><span class="innerhtml">test</span>
                <span class="badge badge-danger rounded-pill float-right px-2" role="button"
                  onclick='$(this).parent().fadeOut("fast","swing", function() { $(this).remove(); $("#prevn${ktr}").remove(); $("#checker${ktr}").remove(); });'>
                  Remove</span>
              </li>
              <li class="list-group-item">
                <span class="bi bi-arrow-return-right pr-2"></span><span class="innerhtml">test</span>
                <span class="badge badge-danger rounded-pill float-right px-2" role="button"
                  onclick='$(this).parent().fadeOut("fast","swing", function() { $(this).remove(); $("#prevn${ktr}").remove(); $("#checker${ktr}").remove(); });'>
                  Remove</span>
              </li>
              <li class="list-group-item">
                <span class="bi bi-arrow-return-right pr-2"></span><span class="innerhtml">test</span>
                <span class="badge badge-danger rounded-pill float-right px-2" role="button"
                  onclick='$(this).parent().fadeOut("fast","swing", function() { $(this).remove(); $("#prevn${ktr}").remove(); $("#checker${ktr}").remove(); });'>
                  Remove</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <hr>

      <div class="form-row">
        <div class="col-md my-1">
          <label for="website" class="form-label">
            Website
            <sup class="badge badge-danger">Required</sup>
          </label>
          <select class="form-control" name="website" id="website" role="button" required>
            <option selected disabled hidden tabindex="-1">Select a website</option>
            @foreach ($sites as $site)
              <option value="{{ $site->id }}">{{ $site->url }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-4 my-1">
          <label for="slug" class="form-label">
            Slug
            <sup class="badge badge-danger">Required</sup>
          </label>
          <input type="text" class="form-control" name="slug" id="slug" placeholder="slug-is-like-this"
            required>
        </div>
      </div>

      <hr>


      {{-- ❗❗ WARNING ❗❗ #context: chapter and rating is [input type=number] --}}
      {{-- apparently, [input type=number] will not block any typing higher or lower that it's min/max but will block-👇 --}}
      {{-- 👉-inputs when the button function is used so use a keyup on #chapter & #rating for that or --👇 --}}
      {{-- 👉--check an .attr('onchange') for #preview-chapter & #preview-rating --}}

      {{-- 📌"It(validation) works when you try to submit the form. If you want to restrict on real-time, you need to use Javascript."📌 --}}
      {{-- ☝☝ https://stackoverflow.com/a/42603419 ☝☝ --}}
      <div class="form-row">
        <div class="col-md my-1">
          <label for="chapter">
            Chapter
            <sup class="badge badge-danger">Required</sup>
          </label>
          <input type="number" name="chapter" class="form-control" id="chapter" min="0" max="65534"
            onkeyup="$('#preview-chapter').text($(this).val());" placeholder="00" required>
        </div>
        <div class="col-md my-1">
          <label for="rating">
            Rating:
            <code id="counter-rating" class="lead">0</code>
            <sup class="badge badge-danger">Required</sup>
          </label>
          <input type="range" name="rating" id="rating" class="form-control-range" min="0"
            max="5" step="0.1" value="0"
            oninput="$('#counter-rating').text($(this).val()); $('#preview-rating').text($(this).val());" required>
        </div>

        <div class="col-md my-1">
          @php
            $status = ['Reading', 'Stacked', 'Completed', 'Plan To Read', 'On Hold', 'Dropped'];
          @endphp
          <label for="reading_status" class="form-label">
            Reading Status
            <sup class="badge badge-danger">Required</sup>
          </label>
          <select class="form-control" name="reading_status" id="reading_status" role="button" required>
            <option selected disabled hidden tabindex="-1">Pick your current reading status</option>
            @foreach ($status as $state)
              <option value="{{ $state }}">{{ $state }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <hr>

      <div class="form-row">
        <div class="col-md my-1">
          <label for="side_notes">
            Notes
            <sup class="badge badge-warning">Optional</sup>
          </label>
          <textarea class="form-control" id="side_notes" placeholder="What are your thoughts regarding this series?"
            onfocus="$(this).select();"></textarea>
          <small class="form-text text-muted float-left">
            Your note must be 2 characters long for it to be added
          </small>
          <button id="btn-add-note" class="btn btn-secondary mt-3 float-right">Add Note</button>
        </div>
        <div class="col-md my-1 mh-25">
          {{-- 👇👇 https://jsfiddle.net/davidliang2008/9kfdwjgx/ --}}
          <div class="card" style="height: calc(250px - 3.5rem);">
            <div class="card-header">
              <strong>Side Notes</strong>
            </div>
            <ul id="ul-notes" class="list-group overflow-auto"></ul>
          </div>
        </div>
      </div>
      <li id="checker" class="list-group hidden"></li>


      <div class="d-flex align-items-end flex-column mt-5">
        <input id="btn-submit" type="submit" class="btn btn-primary" value="Add Series">
      </div>
    </form>
  </div>

  <div class="row my-1 mx-auto">
    <div class="col-md mb-2 px-0">
      <div class="h4 alert alert-primary border-left-primary px-3 rounded">
        Preview
      </div>
      <div class="col-md-6 justify-content-center mx-auto px-0">
        <div class="card border-primary shadow h-100 py-2 m-1">
          <div class="card-title px-3 py-1 mb-0">
            <h3 id="preview-title" class="font-weight-bold text-truncate text-capitalize">
              Lorem ipsum dolor sit amet.
            </h3>
          </div>
          <div class="card-body p-0">
            <div class="row mx-auto px-3 my-2">
              <span role="button" class="col text-primary text-truncate lead px-0">
                <span class="bi bi-paperclip mr-1"></span>
                <span id="preview-web">example.url/</span><span
                  id="preview-slug">{{ Str::slug('Lorem ipsum dolor sit amet') }}</span>
              </span>
              <div class="dropdown float-right">
                <button id="preview-notes" class="btn btn-primary btn-sm btn-icon-split p-0" data-toggle="dropdown"
                  aria-expanded="false">
                  <span class="text">See Notes</span>
                  <span class="icon">
                    <span class="bi bi-sticky"></span>
                  </span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right"></ul>
              </div>
            </div>
            <div class="row align-items-center p-0 mx-auto my-2 px-3">
              <div class="col p-0 m-auto text-left lead">
                Ch <span id="preview-chapter" class="text-truncate">00</span>
              </div>
              <div class="col p-0 m-auto text-center text-muted lead">
                <span class="bi bi-star mr-1"></span>
                <span id="preview-rating" class="text-truncate">0</span>
              </div>
              <div class="col p-0 m-auto text-right">
                <span class="badge badge-dark px-2 font-weight-light">
                  <span class="text-primary">
                    <span id="preview-state" class="bi bi-circle-fill mr-1 p-0"></span>
                  </span>
                  <span id="preview-status" class="lead">Reading</span>
                </span>
              </div>
            </div>
          </div>
          <div class="card-footer border-top-0 bg-transparent m-2 p-3">
            <div class="row text-xs text-muted justify-content-around align-items-center m-0">
              <div class="col px-0">
                <div class="row m-0 p-0">
                  <span class="bi bi-clock-history mr-2"></span>
                  <p class="mb-0">Date Created</p>
                </div>
                <p class="row font-weight-bold m-0">{{ date('g:i a', strtotime(now())) }} &bullet;
                  {{ date('M d, Y', strtotime(now())) }}</p>
              </div>
              <div class="col pl-3 pr-0 border-left border-primary">
                <div class="float-right">
                  <div class="row m-0 p-0">
                    <span class="bi bi-arrow-clockwise mr-2"></span>
                    <p class="mb-0">Last Edited</p>
                  </div>
                  <p class="row font-weight-bold m-0">{{ date('g:i a', strtotime(now())) }} &bullet;
                    {{ date('M d, Y', strtotime(now())) }}</p>
                </div>
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
    //https://jsfiddle.net/2gqpsm6o/ 👈👈 my jsfiddle for asking in stackoverflow
    // console.log('{!! json_encode($sites) !!}');

    $('#title').keyup(function() {
      let title = $('#title').val();
      $('#preview-title').text(title);

      let slug = str_url_slug(title);
      $('#slug').val(slug);
      $('#preview-slug').text(slug);
    });
    $('#website').change(function() {
      let url = $('#website option:selected').text();
      $('#preview-web').text(url);
    });
    $('#slug')
      .on('input', function() {
        $(this).val($(this).val().toLowerCase());
      })
      .keyup(function() {
        if (/^-+/g.test(this.value))
          $(this).val($(this).val().replace(/^-+/g, '')); // Trim `-` from start of text
        // if (/[^\w\-]+/g.test(this.value))
        //   $(this).val($(this).val().replace(/[^\w\-]+/g, '')); // Remove all non-word chars
        if (/\s+/g.test(this.value))
          $(this).val($(this).val().replace(/\s+/g, '-')); // Replace spaces with `-`
        if (/\-\-+/g.test(this.value))
          $(this).val($(this).val().replace(/\-\-+/g, '-')); // Replace multiple `-` with single `-`

        $('#preview-slug').text($(this).val());
      })
      .focusout(function() {
        if (/-+$/g.test(this.value))
          $(this).val($(this).val().replace(/-+$/g, '')); // Trim `-` from end of text

        $('#preview-slug').text($(this).val());
      });




    $('#reading_status').change(function() {
      let status = $('#reading_status option:selected').text();
      $('#preview-status').text(status);
      $('#preview-state').parent().removeAttr('class');

      let color = '';
      if (status === 'Reading') color = "primary";
      else if (status === 'Stacked') color = "light";
      else if (status === 'Completed') color = "success";
      else if (status === 'Plan To Read') color = "secondary";
      else if (status === 'On Hold') color = "warning";
      else color = "danger";

      $('#preview-state').parent().attr('class', `text-${color}`);
    });

    // https://stackoverflow.com/a/995193 👈👈 hands down the best integer generator
    $('#chapter').keypress(function(event) { //https://stackoverflow.com/a/11761415
        if (event.key === "." || event.key === "-" || event.key === "+" || event.key === "e") {
          event.preventDefault(); // Cancel the native operation
        }
      })
      .on('input', function() {
        // 👇 restricts user input but not working
        //   if ($('#chapter').val() > $('#chapter').attr('max'))
        //     $('#chapter').val($('#chapter').attr('max'));

        if ($('#chapter').val().length >= $('#chapter').attr('max').length)
          $('#chapter').val($('#chapter').val().slice(0, $('#chapter').attr('max').length));
      });

    $('#rating').on('input', function() {
      $('#counter-rating').text($('#rating').val());
      $('#preview-rating').text($('#rating').val());
    });

    let ktr = 1;
    $('#btn-add-note').click(function(event) {
      event.preventDefault();

      if ($('#side_notes').val().length > 1) {

        // this👇👇 appends for the getter shit
        $('#checker').append(
          `<input id="checker${ktr}" type="checkbox" name="s_notes[]" checked value="${$('#side_notes').val()}">`
        );

        // this👇👇 appends in side notes
        $('ul#ul-notes').append(`<li class="list-group-item">
        <span class="bi bi-arrow-return-right pr-2"></span><span class="innerhtml">${$('#side_notes').val()}</span>
        <span class="badge badge-danger rounded-pill float-right px-2" role="button"
          onclick='$(this).parent().fadeOut("fast","swing", function() { $(this).remove(); $("#prevn${ktr}").remove(); $("#checker${ktr}").remove(); });'>
          Remove</span></li>`);

        // this👇👇 appends in previews
        $('ul.dropdown-menu.dropdown-menu-right').append(`<li id="prevn${ktr}" class="dropdown-item-text pr-2">
        <span class="bi bi-arrow-return-right mr-1"></span> ${$('#side_notes').val()}</li>`);

        ktr++;

        $('#side_notes').select(); //select all the #side_notes's value
      }
    });

    // const arr = [];
    // $(document).on('submit', 'form', function() {
    //   let list = $('ul#ul-notes').children().find('.innerhtml').toArray();

    //   for (let ktr = 0; ktr < list.length; ktr++) {
    //     const inserts = list[ktr].textContent;
    //     arr.push(inserts);
    //   }

    //   arr.replaceAll(`'`, `"`);
    //   $('#side_notes').val(JSON.parse(arr));
    // });

    /* // simple str_slug that will escape special letters like " ä " and apostrophes
    function slugify(text) { //🔗: https://stackoverflow.com/a/51809052
      return text.toString().toLowerCase()
        .replace(/\s+/g, '-') // Replace spaces with -
        .replace(/[^\w\-]+/g, '') // Remove all non-word chars
        .replace(/\-\-+/g, '-') // Replace multiple - with single -
        .replace(/^-+/, '') // Trim - from start of text
        .replace(/-+$/, ''); // Trim - from end of text
    } */

    // complex str_slug that will convert special letters like " ä " to " a " and will consider apostrophes as whitespace
    function str_url_slug(s, opt) { //🔗: https://stackoverflow.com/a/36504621
      s = String(s);
      opt = Object(opt);

      var defaults = {
        'delimiter': '-',
        'limit': undefined,
        'lowercase': true,
        'replacements': {},
        'transliterate': (typeof(XRegExp) === 'undefined') ? true : false
      };

      // Merge options
      for (var k in defaults) {
        if (!opt.hasOwnProperty(k)) {
          opt[k] = defaults[k];
        }
      }

      var char_map = {
        // Latin
        'À': 'A',
        'Á': 'A',
        'Â': 'A',
        'Ã': 'A',
        'Ä': 'A',
        'Å': 'A',
        'Æ': 'AE',
        'Ç': 'C',
        'È': 'E',
        'É': 'E',
        'Ê': 'E',
        'Ë': 'E',
        'Ì': 'I',
        'Í': 'I',
        'Î': 'I',
        'Ï': 'I',
        'Ð': 'D',
        'Ñ': 'N',
        'Ò': 'O',
        'Ó': 'O',
        'Ô': 'O',
        'Õ': 'O',
        'Ö': 'O',
        'Ő': 'O',
        'Ø': 'O',
        'Ù': 'U',
        'Ú': 'U',
        'Û': 'U',
        'Ü': 'U',
        'Ű': 'U',
        'Ý': 'Y',
        'Þ': 'TH',
        'ß': 'ss',
        'à': 'a',
        'á': 'a',
        'â': 'a',
        'ã': 'a',
        'ä': 'a',
        'å': 'a',
        'æ': 'ae',
        'ç': 'c',
        'è': 'e',
        'é': 'e',
        'ê': 'e',
        'ë': 'e',
        'ì': 'i',
        'í': 'i',
        'î': 'i',
        'ï': 'i',
        'ð': 'd',
        'ñ': 'n',
        'ò': 'o',
        'ó': 'o',
        'ô': 'o',
        'õ': 'o',
        'ö': 'o',
        'ő': 'o',
        'ø': 'o',
        'ù': 'u',
        'ú': 'u',
        'û': 'u',
        'ü': 'u',
        'ű': 'u',
        'ý': 'y',
        'þ': 'th',
        'ÿ': 'y',

        // Latin symbols
        '©': '(c)',

        // Greek
        'Α': 'A',
        'Β': 'B',
        'Γ': 'G',
        'Δ': 'D',
        'Ε': 'E',
        'Ζ': 'Z',
        'Η': 'H',
        'Θ': '8',
        'Ι': 'I',
        'Κ': 'K',
        'Λ': 'L',
        'Μ': 'M',
        'Ν': 'N',
        'Ξ': '3',
        'Ο': 'O',
        'Π': 'P',
        'Ρ': 'R',
        'Σ': 'S',
        'Τ': 'T',
        'Υ': 'Y',
        'Φ': 'F',
        'Χ': 'X',
        'Ψ': 'PS',
        'Ω': 'W',
        'Ά': 'A',
        'Έ': 'E',
        'Ί': 'I',
        'Ό': 'O',
        'Ύ': 'Y',
        'Ή': 'H',
        'Ώ': 'W',
        'Ϊ': 'I',
        'Ϋ': 'Y',
        'α': 'a',
        'β': 'b',
        'γ': 'g',
        'δ': 'd',
        'ε': 'e',
        'ζ': 'z',
        'η': 'h',
        'θ': '8',
        'ι': 'i',
        'κ': 'k',
        'λ': 'l',
        'μ': 'm',
        'ν': 'n',
        'ξ': '3',
        'ο': 'o',
        'π': 'p',
        'ρ': 'r',
        'σ': 's',
        'τ': 't',
        'υ': 'y',
        'φ': 'f',
        'χ': 'x',
        'ψ': 'ps',
        'ω': 'w',
        'ά': 'a',
        'έ': 'e',
        'ί': 'i',
        'ό': 'o',
        'ύ': 'y',
        'ή': 'h',
        'ώ': 'w',
        'ς': 's',
        'ϊ': 'i',
        'ΰ': 'y',
        'ϋ': 'y',
        'ΐ': 'i',

        // Turkish
        'Ş': 'S',
        'İ': 'I',
        'Ç': 'C',
        'Ü': 'U',
        'Ö': 'O',
        'Ğ': 'G',
        'ş': 's',
        'ı': 'i',
        'ç': 'c',
        'ü': 'u',
        'ö': 'o',
        'ğ': 'g',

        // Russian
        'А': 'A',
        'Б': 'B',
        'В': 'V',
        'Г': 'G',
        'Д': 'D',
        'Е': 'E',
        'Ё': 'Yo',
        'Ж': 'Zh',
        'З': 'Z',
        'И': 'I',
        'Й': 'J',
        'К': 'K',
        'Л': 'L',
        'М': 'M',
        'Н': 'N',
        'О': 'O',
        'П': 'P',
        'Р': 'R',
        'С': 'S',
        'Т': 'T',
        'У': 'U',
        'Ф': 'F',
        'Х': 'H',
        'Ц': 'C',
        'Ч': 'Ch',
        'Ш': 'Sh',
        'Щ': 'Sh',
        'Ъ': '',
        'Ы': 'Y',
        'Ь': '',
        'Э': 'E',
        'Ю': 'Yu',
        'Я': 'Ya',
        'а': 'a',
        'б': 'b',
        'в': 'v',
        'г': 'g',
        'д': 'd',
        'е': 'e',
        'ё': 'yo',
        'ж': 'zh',
        'з': 'z',
        'и': 'i',
        'й': 'j',
        'к': 'k',
        'л': 'l',
        'м': 'm',
        'н': 'n',
        'о': 'o',
        'п': 'p',
        'р': 'r',
        'с': 's',
        'т': 't',
        'у': 'u',
        'ф': 'f',
        'х': 'h',
        'ц': 'c',
        'ч': 'ch',
        'ш': 'sh',
        'щ': 'sh',
        'ъ': '',
        'ы': 'y',
        'ь': '',
        'э': 'e',
        'ю': 'yu',
        'я': 'ya',

        // Ukrainian
        'Є': 'Ye',
        'І': 'I',
        'Ї': 'Yi',
        'Ґ': 'G',
        'є': 'ye',
        'і': 'i',
        'ї': 'yi',
        'ґ': 'g',

        // Czech
        'Č': 'C',
        'Ď': 'D',
        'Ě': 'E',
        'Ň': 'N',
        'Ř': 'R',
        'Š': 'S',
        'Ť': 'T',
        'Ů': 'U',
        'Ž': 'Z',
        'č': 'c',
        'ď': 'd',
        'ě': 'e',
        'ň': 'n',
        'ř': 'r',
        'š': 's',
        'ť': 't',
        'ů': 'u',
        'ž': 'z',

        // Polish
        'Ą': 'A',
        'Ć': 'C',
        'Ę': 'e',
        'Ł': 'L',
        'Ń': 'N',
        'Ó': 'o',
        'Ś': 'S',
        'Ź': 'Z',
        'Ż': 'Z',
        'ą': 'a',
        'ć': 'c',
        'ę': 'e',
        'ł': 'l',
        'ń': 'n',
        'ó': 'o',
        'ś': 's',
        'ź': 'z',
        'ż': 'z',

        // Latvian
        'Ā': 'A',
        'Č': 'C',
        'Ē': 'E',
        'Ģ': 'G',
        'Ī': 'i',
        'Ķ': 'k',
        'Ļ': 'L',
        'Ņ': 'N',
        'Š': 'S',
        'Ū': 'u',
        'Ž': 'Z',
        'ā': 'a',
        'č': 'c',
        'ē': 'e',
        'ģ': 'g',
        'ī': 'i',
        'ķ': 'k',
        'ļ': 'l',
        'ņ': 'n',
        'š': 's',
        'ū': 'u',
        'ž': 'z'
      };

      // Make custom replacements
      for (var k in opt.replacements) {
        s = s.replace(RegExp(k, 'g'), opt.replacements[k]);
      }

      // Transliterate characters to ASCII
      if (opt.transliterate) {
        for (var k in char_map) {
          s = s.replace(RegExp(k, 'g'), char_map[k]);
        }
      }

      // Replace non-alphanumeric characters with our delimiter(-)
      var alnum = (typeof(XRegExp) === 'undefined') ? RegExp('[^a-z0-9]+', 'ig') : XRegExp('[^\\p{L}\\p{N}]+', 'ig');
      s = s.replace(alnum, opt.delimiter);

      // Remove duplicate delimiters
      s = s.replace(RegExp('[' + opt.delimiter + ']{2,}', 'g'), opt.delimiter);

      // Truncate slug to max. characters
      s = s.substring(0, opt.limit);

      // Remove delimiter from ends
      s = s.replace(RegExp('(^' + opt.delimiter + '|' + opt.delimiter + '$)', 'g'), '');

      return opt.lowercase ? s.toLowerCase() : s;
    }
  </script>
@endsection
