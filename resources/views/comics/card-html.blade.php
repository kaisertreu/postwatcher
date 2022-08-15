<div class="col-sm-4 mb-2 px-0">
  <div class="card border-primary shadow h-100 m-1">
    <div class="card-header border-primary px-1 py-0">
      <div class="row mx-auto p-0 justify-content-between align-items-center">
        <span class="badge badge-dark font-weight-light py-1">
          <span class="bi bi-record-fill mr-1 text-primary"></span> Reading
        </span>
        <div class="row align-items-center p-0 m-0">
          <small class="px-2" role="button" data-toggle="popover" data-trigger="hover" data-placement="right"
            data-html="true" title="<div>Last Edited</div><div>HH:MM AP &bullet; MM DD, YYYY</div>"
            data-content="<div>Date Created</div><div>HH:MM AP &bullet; MM DD, YYYY</div>">
            <span class="bi bi-clock"></span>
          </small>
          <div class="dropright">
            <button class="btn btn-link text-decoration-none p-0 text-body" role="button" data-toggle="dropdown"
              aria-expanded="false">
              <span class="bi bi-three-dots-vertical"></span>
              {{-- <span class="bi bi-gear-fill px-1"></span> --}}
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item px-2" role="button">
                <span class="bi bi-eye mr-2"></span> View
              </a>
              <a class="dropdown-item px-2 text-info" role="button">
                <span class="bi bi-pencil-square mr-2"></span>
                Edit
              </a>
              <a class="dropdown-item px-2 text-danger" role="button">
                <span class="bi bi-archive mr-2"></span>
                Archive
              </a>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body px-3 pt-3 pb-0 mx-auto">
      <div class="card-title mx-auto">
        <a href="#" target="_blank" class="text-body text-decoration-none font-weight-bold h3">
          Lorem ipsum dolor sit amet consectetur ...
        </a>
      </div>
      <div class="row align-items-center mx-auto">
        <div class="col p-0 m-auto text-muted">
          <span class="bi bi-star mr-1"></span>N/A
        </div>
        <div class="col p-0">
          <div class="dropdown float-right">
            <button class="btn btn-outline-primary text-left text-decoration-none rounded-pill px-2 py-0"
              data-toggle="dropdown" aria-expanded="false">
              See Notes<span class="bi bi-sticky ml-1"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer bg-transparent border-0 px-3 pb-1 pt-0">
      <div class="d-flex justify-content-center">
        <span class="m-0 lead">Chapter</span>
      </div>
      <div class="row align-items-center m-0 p-0">
        <div class="input-group">
          <div class="input-group-prepend">
            <button class="btn btn-lg btn-outline-dark"><span class="bi bi-dash-lg"></span></button>
          </div>
          <input type="number" class="form-control form-control-lg p-1 border-dark text-center" placeholder="00">
          <div class="input-group-append">
            <button class="btn btn-lg btn-outline-dark"><span class="bi bi-plus-lg"></span></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@php
// 👇👇 DISCONTINUED
/* function html_card(id, title, url, chapter, notes, color, status, rating, created_at, updated_at) {
      let card_append = '';

      card_append += '<div class="col-sm-4 mb-2 px-0">'; //start .col-sm-4
      card_append += '<div class="card border-' + color + ' shadow h-100 m-1">'; //start .card

      card_append += '<div class="card-header border-' + color + ' px-1 py-1">'; //start .card-header
      card_append += '<div class="row mx-auto p-0 justify-content-between align-items-center">'; //start outer .row
      card_append += '<span class="badge badge-dark font-weight-light py-1">'; //start .badge
      card_append += '<span class="bi bi-record-fill mr-1 text-' + color + '"></span> ' + status + '</span>'; //end .badge
      card_append += '<div class="row align-items-center p-0 m-0">'; //start inner .row
      card_append += '<small id="po' + id + '" class="px-2" role="button">'; //start .small popover
      card_append += '<span class="bi bi-clock"></span>'; //bs icon
      card_append += '</small>'; //end .small popover
      $('#po' + id).popover({
        trigger: 'hover',
        placement: 'right',
        html: true,
        title: '<div>Last Edited</div><div>' + updated_at + '/div>',
        content: '<div>Date Created</div> <div' + created_at + '</div>'
      });

      //   $('#po' + id).popover({
      //     trigger: 'hover',
      //     placement: 'right',
      //     container: 'small.#po' + id,
      //     html: true,
      //     template: '<div class="popover" role="tooltip">' +
      //       '<div class="arrow"></div>' +
      //       '<div class="popover-header">' +
      //       '<div>Last Edited</div>' +
      //       '<div>' + updated_at + '/div>' +
      //       '</div>' +
      //       '<div class="popover-body">' +
      //       '<div>Date Created</div>' +
      //       '<div' + created_at + '</div>' +
      //       '</div>' +
      //       '</div>'
      //   });

      card_append += '<div class="dropright">'; //end .dropright
      card_append +=
        '<button class="btn btn-link text-decoration-none p-0 text-body" role="button" data-toggle="dropdown"'; //end .btn-link
      card_append += 'aria-expanded="false"><span class="bi bi-three-dots-vertical"></span>'; //bs icon
      card_append += '</button>'; //end .btn-link
      card_append += '<ul class="dropdown-menu dropdown-menu-right">'; //start ul.dropdown-menu.dropdown-menu-right
      card_append += '<a class="dropdown-item px-2" role="button">'; //start .dropdown-item
      card_append += '<span class="bi bi-eye mr-2"></span> View</a>'; //bs icon //end .dropdown-item
      card_append += '<a class="dropdown-item px-2 text-info" role="button">'; //start .dropdown-item
      card_append += '<span class="bi bi-pencil-square mr-2"></span> Edit</a>'; //bs icon //end .dropdown-item
      card_append += '<a class="dropdown-item px-2 text-danger" role="button">'; //start .dropdown-item
      card_append += '<span class="bi bi-archive mr-2"></span> Archive</a>'; //bs icon //end .dropdown-item
      card_append += '</ul>'; //end ul.dropdown-menu.dropdown-menu-right
      card_append += '</div>'; //end .dropright

      card_append += '</div>'; //end inner .row
      card_append += '</div>'; //end outer .row
      card_append += '</div>'; //end .card-header

      card_append += '<div class="card-body px-3 pt-3 pb-0 mx-auto">'; //start .card-body
      card_append += '</div>'; //end .card-body

      card_append += '<div class="card-footer bg-transparent border-0 px-3 pb-1 pt-0">';
      card_append += '</div>'

      card_append += '</div>'; //end .card
      card_append += '</div>' //end .col-sm-4

      return card_append;
    } */

/* function html_card2(row) { //template
      let card_template = '<div class="col-sm-4 mb-2 px-0">';
      card_template += '<div class="card border-' + row.status_color + ' shadow h-100 py-2 m-1">';
      card_template += '<div class="card-title px-3 py-1 mb-0">';
      card_template += '<h5 id="title" class="font-weight-bold text-truncate">';
      card_template += row.title;
      card_template += '</h5>';
      card_template += '</div>';
      card_template += '<div class="card-body px-3 py-0">';
      card_template += '<div class="row p-0">';
      //👇https://stackoverflow.com/a/51376038
      card_template += '<a href="//' + row.url_link + '" target="_blank" class="col text-decoration-none text-truncate">';
      card_template += '<span class="bi bi-paperclip mr-1"></span>'; //bootstrap icon
      card_template += row.url_link;
      card_template += '</a>';
      if (row.note != '[]') {
        card_template += '<div class="dropdown float-right">'; //👈👈 https://stackoverflow.com/a/72765436
        card_template += '<button id="' + row.id + '" role="button" data-toggle="dropdown"' +
          'class="btn btn-outline-' + row.status_color + ' text-left rounded-pill px-2 py-0 mr-3" ' +
          'onClick="getNotes(&apos;' + encodeURIComponent(JSON.stringify(row.note)).replace(/[!'()*]/g, escape) +
          //☝☝https://stackoverflow.com/a/18251730
          '&apos;, ' + row.id +
          ');" aria-expanded="false">'; //encodeURIComponent(JSON.stringify(notes)) above☝☝ is choking when there's apostrophe(\') in notes smh gg
        card_template += 'See Notes<span class="bi bi-sticky ml-1"></span></button>';
        card_template += '<ul class="dropdown-menu dropdown-menu-right">';
        card_template += '</ul>';
        card_template += '</div>';
      }
      card_template += '</div>';
      card_template += '<div class="row align-items-center justify-content-between p-0 mx-auto my-1">'; //.row
      card_template += '<div class="col p-0">'; //start .col
      card_template += '<button class="btn btn-link text-decoration-none p-0">';
      card_template += '<span class="bi bi-eye mr-1"></span>Ch ' + row.chapter;
      card_template += '</button>';
      card_template += '</div>'; //end .col
      card_template += '<div class="col p-0 m-auto text-center text-muted">'; //start .col
      card_template += '<span class="bi bi-star mr-1"></span>';
      card_template += ((row.rating != null) ? row.rating : 'N/A');
      card_template += '</div>';
      card_template += '<div class="col p-0 m-auto text-right"><span class="badge badge-dark' +
        ' badge-pill px-2 py-1 font-weight-light"><span class="bi bi-record-fill text-' + row.status_color +
        ' mr-1 p-0"></span>';
      card_template += row.reading_status + '</span>';
      card_template += '</div></div>'; //end .col .row

      //❗important, don't delete❗
      // if (notes != '[]') { //accordion
      //     card_template += '<div id="accordion' + id + '">';
      //     card_template += '<div class="card my-1 p-0">';
      //     card_template += '<div class="card-header m-0 p-0">';
      //     card_template += '<button class="btn btn-link btn-block text-left text-decoration-none" ' +
      //     'data-toggle="collapse" data-target="#sticky-note' + id + '">';
      //     card_template += '<span class="bi bi-sticky-fill mr-2"></span> Notes'; //bootstrap icon
      //     card_template += '</button>';
      //     card_template += '</div>'; //end of.card-header
      //     card_template += '<div id="sticky-note' + id + '" class="collapse" data-parent="#accordion' + id + '">';
      //     card_template += '<div class="card-body p-2">';
      //     //problem: i don't know how to display ["this", "kind of", "motherfucking bullshit lmao"]
      //     //solution: 👉 https://stackoverflow.com/a/2817738
      //     //
      //     {
      //     let str = notes;
      //     let aStr = str.match(/\w+|"[^"]+"/g),
      //         i = aStr.length;
      //     while (i--) {
      //         aStr[i] = aStr[i].replace(/"/g, "");
      //     }
      //     notes = aStr;
      //     }
      //     //
      //     //json parse is much more better smh
      //     notes = JSON.parse(notes);
      //     for (let note of notes) {
      //     card_template += '<div class="row m-auto px-3">';
      //     card_template += '&raquo; ' + note; //notes content
      //     card_template += '</div>';
      //     }
      //     card_template += '</div>';
      //     card_template += '</div>'; //end of#sticky-note
      //     card_template += '</div>'; //end of.card
      //     card_template += '</div>'; //end of#accordion
      // }

      card_template += '</div>'; //end .card-body?
      card_template += '<div class="card-footer border-top-0' +
        ' bg-transparent px-3 py-0">'; //.bg-transparent because .card-footer has a natural grayish color
      card_template += '<div class="row text-xs text-muted justify-content-around align-items-center m-0">';
      card_template += '<div class="col p-0">';
      card_template += '<div class="row m-0 p-0">';
      card_template += '<p class="mb-0">Date Created</p>';
      card_template += '</div>'; // .row
      card_template += '<p class="row font-weight-bold m-0">' + row.creation_date + '</p>';
      card_template += '</div>'; // .col
      if (row.creation_date != row.last_updated) { //displaying last updated
        card_template += '<div class="col p-0 pl-1">';
        card_template += '<div class="float-right">';
        card_template += '<div class="row m-0 p-0">';
        card_template += '<p class="mb-0">Last Edited</p>';
        card_template += '</div>'; // .row
        card_template += '<p class="row font-weight-bold m-0">' + row.last_updated + '</p>';
        card_template += '</div>'; //
        card_template += '</div>'; // .col
      }
      card_template += '</div>'; // .row
      card_template += '</div>'; // .card-footer
      card_template += '</div></div>'; //end of .card > .col-sm-6

      return card_template;
    } */
@endphp
