// converter string to url
function stringToSlug(str) {

    str = str.toLowerCase().trim();
    const from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
    const to = "aaaaaeeeeeiiiiooooouuuunc------";

    for (let i = 0, l = from.length; i < l; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '');
    str = str.replace(/\s+/g, '-');

    return str;
}

// dynamic form
function createDynamicForm(url, method, submit) {

    let form = $('<form />', {
        action: url,
        method: 'POST'
    });

    let inputMethod = $('<input />', {
        type: 'hidden',
        name: '_method',
        value: method
    });

    let inputToken = $('<input />', {
        type: 'hidden',
        name: '_token',
        value: $('meta[name="csrf-token"]').attr('content')
    });

    form.append(inputMethod);
    form.append(inputToken);

    if (submit) {
        $(document.body).append(form);
        form.submit();
    }

    return form;
}