
toastr.options.progressBar = false;
toastr.options.closeButton = true;
toastr.options.toastClass = 'toastr';


(function ($) {
    $.movego = {

        form: function (form, url, method, succesMessage, validationErrors) {

            var formData = new FormData(form[0]);

            for (var pair of formData.entries()) {
                console.log(pair[0] + ' => ' + pair[1]);
            }

            // run validations
            if (validationErrors()) return;

            //ajax
            axios({
                method: method,
                url: url,
                data: formData,
            })
                .then(function (response) {
                    console.log(response);

                    if (response.data.url) {
                        window.location.href = response.data.url;
                    } else {
                        toastr.success(succesMessage, 'Success');
                    }

                    if (response.data.reload) {
                        location.reload();
                    }
                })
                .catch(function (error) {
                    console.log(error.response.data.message);
                    $.simplyGlobal.toastrErrors(error);

                });
        },


        toastrErrors: function (error) {
            var ers = error.response.data.errors;
            var lineErrors = "";
            for (var key in ers) {
                lineErrors += '- ' + ers[key] + '<br> ';
            }
            toastr.error(lineErrors, error.response.data.message);
        },

        toastrOnLoad: function (hash, message) {
            if (window.location.hash === hash) {
                toastr.success(message);
                history.pushState("", document.title, window.location.pathname);
            }
        },

        toastrOnLoadCallback: function (hash, message, callback) {
            if (window.location.hash === hash) {
                toastr.success(message);
                history.pushState("", document.title, window.location.pathname);
                callback();
            }
        },

        isImage: function(file) {

             if(file['type'].split('/')[0] == 'image'){
               return true;
             }else{
               toastr.error('The uploaded file is not an image');
               return false;
             }

        },

        formFilesIsImages: function(form){
          var clear = true;

          $(form+' input:file').each(function(){
            var pic = $(this)[0].files[0];

            if(pic){
              if(!$.simplyGlobal.isImage(pic)) clear = false;
            }

          })
          //all files are images
          return clear;
        },

        clearModal: function(id){
        $(id).on('hidden.bs.modal', function (e) {
            $(this)
                .find("input,textarea,select")
                .val('')
                .end()
                .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .end();
        })
    }
    };

    $.movego.toastrOnLoad('#event-deleted', 'Event deleted');

}(jQuery));
