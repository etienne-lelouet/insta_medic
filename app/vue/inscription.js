$(document).ready(function () {

    $("#submitButton").prop("disabled", true);

    $("#login").on('input', function (e) {
        var lenlog = $("#login").val().length;
        if (lenlog > 14 || lenlog <= 3) {
            toggleLogin(false);
            formError("#login");
        }
        else {
            var pattern = new RegExp("^[a-zA-Z]\\w{3,14}$");
            var str = $("#login").val();

            if (pattern.test(str)) {
                formValid("#login");
            }
            else {
                toggleLogin(false);
                formError("#login");
            }
        }
    });

    $("#login").focusout(function () {

        var pattern = new RegExp("^([a-zA-Z])\\w{3,14}$");
        var str = $("#login").val();

        if (pattern.test(str)) {
            $.get("index.php", { query: 'ajax', page: 'checkdoublons', login: str }, function (data) {
                data = JSON.parse(data);
                if (data.login == "valid") {
                    toggleLogin(true);
                    formValid("#login");
                }
                else {
                    formError("#login");
                }
            });

        }
    })
});

$('form input').on('keypress', function (e) { //desactive la soumission de formulaires avec enter
    return e.which !== 13;
});

function toggleLogin(state) {
    if (state) {
        $("#submitButton").prop("disabled", false);
    }
    else {
        $("#submitButton").prop("disabled", true);
    }
}

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

var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

