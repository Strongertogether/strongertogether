$(document).ready(function () {
    $('#submitBtn').click(function () {
        validate_user();
    });
    $("#email,#pass,#pass2").keyup(function () {
        if ($(this).val() !== "") {
            $(".error").fadeOut();
            return false;
        }
    });

    $("#email").keyup(function () {
        var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
        if ($(this).val() !== "" && emailreg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });
    $("#pass").keyup(function () {
        if ($(this).val().length >= 6) {
            $(".error").fadeOut();
            return false;
        }
    });
    $("#pass2").keyup(function () {
        if ($(this).val().length >= 6) {
            $(".error").fadeOut();
            return false;
        }
    });

}); //ready

function validate_user() {
    var result = true;
    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var email = $("#email").val();
    var password = $("#pass").val();
    var repeat_password = $("#pass2").val();

    $(".error").remove();
    if (!emailreg.test($("#email").val()) || $("#email").val() === "") {
        $("#email").focus().after("<span class='error'>Ingresa tu email</span>");
        result = false;
    }  else if ($("#pass").val() === "") {
        $("#pass").focus().after("<span class='error'>Ingrese su contraseña</span>");
        result = false;
    } else if ($("#pass").val().length < 6) {
        $("#pass").focus().after("<span class='error'>Mínimo 6 carácteres para la contraseña</span>");
        result = false;
    } else if ($("#pass2").val() !== $("#pass2").val()) {
        $("#pass2").focus().after("<span class='error'>Debe coincidir con la contraseña</span>");
        result = false;
    }

    if (result) {
        var data = {"email": email,"password": password, "repeat_password": repeat_password};
        var data_users_JSON = JSON.stringify(data);
        $.post(amigable2("?module=users&function=signup_user"), {signup_user_json: data_users_JSON},
        function (response) {
            console.log(response);
            if (response.success) {
              console.log("sign up correcto");
                window.location.href = response.redirect;
            } else {
                if (response.typeErr === "Email") {
                    $("#email").focus().after("<span class='error'>" + response.error + "</span>");
                } else {
                  if (response["datos"]["email"] !== undefined && response["datos"]["email"] !== null) {
                        $("#email").focus().after("<span class='error'>" + response["datos"]["email"] + "</span>");
                    }
                    if (response["datos"]["password"] !== undefined && response["datos"]["password"] !== null) {
                        $("#pass").focus().after("<span class='error'>" + response["datos"]["password"] + "</span>");
                        //$("#inputPass").focus().after("<span class='error'>" + response.error.password + "</span>");
                    }
                }
            }
        }, "json").fail(function (xhr, textStatus, errorThrown) {
            //console.log(xhr);
            //console.log(xhr.responseJSON);
            //console.log(xhr.responseText);
            if( (xhr.responseJSON === undefined) || (xhr.responseJSON === null) )
                xhr.responseJSON = JSON.parse(xhr.responseText);
            if (xhr.status === 0) {
                alert('Not connect: Verify Network.');
            } else if (xhr.status === 404) {
                alert('Requested page not found [404]');
            } else if (xhr.status === 500) {
                alert('Internal Server Error [500].');
            } else if (textStatus === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (textStatus === 'timeout') {
                alert('Time out error.');
            } else if (textStatus === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error: ' + xhr.responseText);
            }
        });
    }
}
