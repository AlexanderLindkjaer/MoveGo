$(document).on("click", "#create_event_submit", function () {

    let form_id = '#create_event_form';
    let form = $(form_id);
    let url = '/event/create';
    let method = 'post';
    let succesMessage = '';

    $.movego.form(form, url, method, succesMessage, function () {
        return false
    });
});

$('document').ready(function () {

    if ($('#header_typed').length) {

        var options = {
            strings: [
                // 'i nærheden af dig',
                // 'når det skal være sjovt',
                // 'når det skal være socialt',
                'som det passer dig'

            ],
            typeSpeed: 50,
            backSpeed: 25,
            backDelay: 500,
            startDelay: 1000,
            smartBackspace: true,
            showCursor: true,
            onComplete: function () {
                $(".typed-cursor").hide();
            }
        }
        var typed = new window.Typed("#header_typed", options);

    }
});

