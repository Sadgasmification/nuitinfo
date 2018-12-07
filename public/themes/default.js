function initialization() {
    $('head').append('<link rel="stylesheet" href="./themes/css/default.css" type="text/css" />');

    html = ''
    html += '<div id="th-menu-btn" data-target="th-menu"></div>'
    html += '<div id="th-menu" data-collapse="false">'
    html += '<input class="th-choice" id="th-normal" type="radio" name="type" value="normal"><label for="th-normal"></label>'
    html += '<input class="th-choice" id="th-dark" type="radio" name="type" value="dark"><label for="th-dark"></label>'
    html += '<input class="th-choice" id="th-deuteranopie" type="radio" name="type" value="deuteranopie"><label for="th-deuteranopie"></label>'
    html += '<input class="th-choice" id="th-protenaropie" type="radio" name="type" value="protenaropie"><label for="th-protenaropie"></label>'
    html += '<input class="th-choice" id="th-tritanopie" type="radio" name="type" value="tritanopie"><label for="th-tritanopie"></label>'
    html += '</div>'

    $('body').append(html)

    $('.th-choice').prop('checked', 'false')
    if ($('body').hasClass('dark'))
        $('#th-dark').prop('checked', 'true')
    else if ($('body').hasClass('deuteranopie')) $('#th-deuteranopie').prop('checked', 'true')
    else if ($('body').hasClass('protenaropie')) $('#th-protenaropie').prop('checked', 'true')
    else if ($('body').hasClass('tritanopie')) $('#th-tritanopie').prop('checked', 'true')
    else $('#th-normal').prop('checked', 'true')
}

$(document).ready(function() {
    initialization()
})

$(document).on('click', '#th-menu-btn', function() {
    $('#'+$(this).attr('data-target')).attr('data-collapse', !($('#'+$(this).attr('data-target')).attr('data-collapse') == "true"))
})

$(document).on('change', '.th-choice', function() {
    $('body').removeClass('dark deuteranopie protenaropie tritanopie')
    if (this.value != "normal") {
        $('body').addClass(this.value)
    }
});
