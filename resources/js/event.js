
$(document).on("click","#create_event_submit",function() {

    let form_id = '#create_event_form';
    let form = $(form_id);
    let url = '/event/create';
    let method = 'post';
    let succesMessage = '';

    $.movego.form(form, url, method, succesMessage, function(){
        return false
    });
});