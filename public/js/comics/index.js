function is_updating(_id) {
    $(`.ctrl-btn${_id}`).addClass('disabled').attr('tabindex', '-1');
}

function done_updating(_id) {
    $(`.ctrl-btn${_id}`).removeClass('disabled').removeAttr('tabindex');
}

function is_loading() {
    $('#search-title').attr('disabled', 'disabled');
    $('#ul-sort a').addClass('disabled').attr('tabindex', '-1');
    $('#loading-screen').show();
    //   $('#counter').text('__ / __');
    $('#load-more').addClass('disabled').attr('tabindex', '-1');
}

function done_loading() {
    $('#loading-screen').hide();
    $('#load-more').removeClass('disabled').removeAttr('tabindex');
    $('#ul-sort a').removeClass('disabled').removeAttr('tabindex');
    $('#search-title').removeAttr('disabled');
}

function delay(callback, ms) {
    var timer = 0;
    return function () {
        let context = this,
            args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, ms || 0);
    };
}

function html_card(row) {
    let id = row.id,
        title = row.title,
        url = row.url_link,
        chapter = row.chapter,
        notes = row.note,
        rate = row.rating,
        color = row.status_color,
        status = row.reading_status,
        web_name = row.web_name;

    let template = $(".template-card").clone()
        .attr('class', 'plated-card col-sm-6 mb-2 px-0')
        .removeClass('hidden');

    template.find('.color-border').addClass(`border-${color}`);

    (color === 'dark') ? template.find('.color-badge').addClass('text-light') : template.find('.color-badge')
        .addClass(`text-${color}`);

    // template.find('.3d-btn').attr('id', `ctrl${id}`).attr('onClick', `get3dControls(${id})`);

    template.find('.color-badge').after(status);
    template.find('.web-badge').text(`@${web_name}`);
    template.find('.title-text').attr('href', `//${url}`);
    template.find('.title-text').text(title);
    template.find('.rate-text').after(rate);

    template.find('.current-chapter').text(chapter).attr('id', `ch${id}`)
        .attr('onClick', `getChapterControls('${id}')`);

    template.find('form.btn-group-vertical').attr('id', `form${id}`);

    if (notes != '[]') {
        template.find('.note-populate').empty();
        template.find('.color-btn').attr('id', `note${id}`).addClass(`btn-${color}`)
            .attr('onClick', `getNotes('${encodeURIComponent(JSON.stringify(notes)).replace(/[!'()*]/g, escape)}', ${id})`);
    } else {
        template.find('.note-check').remove();
        template.find('.card-footer').children().children().addClass('text-center')
    }

    return template;
}

function html_filter(element, symbol, initial_color, current_color) {
    return element.siblings("b").text(symbol).parent().removeClass(initial_color).addClass(current_color);
}

function html_result(element, icon, symbol, text) {
    return element.children('i').removeAttr('class').addClass(`bi bi-${icon}`).siblings('b').text(symbol).siblings('span').text(text);
} //try using this
