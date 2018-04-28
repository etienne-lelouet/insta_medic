$(document).ready(function () {

    $("input").focusout(function (e) {

        var elem = $(this).attr('id');
        var field = $("#" + elem);

        if (elem == "login" || elem == "email") {
            $.get("index.php", { page: 'query', queryType: 'validate', field: elem, value: field.val() }, function (data) {
                data = JSON.parse(data);
                if (data.res == true) {
                    $.get("index.php", { page: 'query', queryType: 'checkdoublons', field: elem, value: field.val() }, function (data) {
                        console.log(data);
                        data = JSON.parse(data);
                        if (data.res == true) {
                            formValid(field);
                        }
                        else {
                            formError(field);
                        }
                    });
                }
                else {
                    formError(field);
                }
            });
        }

        if (field.length) {
            if (field.val().length > 3) {
                $.get("index.php", { page: 'query', queryType: 'validate', field: elem, value: field.val() }, function (data) {
                    data = JSON.parse(data);
                    if (data.res == true) {
                        formValid(field);
                    }
                    else {
                        formError(field);
                    }
                });
            }
        }
    });
});


function formError(formId) {
    $(formId).css({
        "border-color": "red",
        "border-width": "medium"
    });
}

function formValid(formId) {
    $(formId).css({
        "border-color": "green",
        "border-width": "medium"
    });
}