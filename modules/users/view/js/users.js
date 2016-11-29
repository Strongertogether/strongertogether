jQuery.fn.fill_or_clean = function () {
  this.each(function () {

    ///////////

    if ($("#name").attr("value") == "") {
      $("#name").attr("value", "Introduce your name");
      $("#name").focus(function () {
        if ($("#name").attr("value") == "Introduce your name") {
          $("#name").attr("value", "");
        }
      });
    }
    $("#name").blur(function () { //Onblur se activa cuando el usuario retira el foco
      if ($("#name").attr("value") == "") {
        $("#name").attr("value", "Introduce your name");
      }
    });

    //////////


    if ($("#surname").attr("value") == "") {
      $("#surname").attr("value", "Introduce your surname");
      $("#surname").focus(function () {
        if ($("#surname").attr("value") == "Introduce your surname") {
          $("#surname").attr("value", "");
        }
      });
    }
    $("#surname").blur(function () { //Onblur se activa cuando el usuario retira el foco
      if ($("#surname").attr("value") == "") {
        $("#surname").attr("value", "Introduce your surname");
      }
    });

    //////////


    if ($("#id_document").attr("value") == "") {
      $("#id_document").attr("value", "Introduce your ID Document");
      $("#id_document").focus(function () {
        if ($("#id_document").attr("value") == "Introduce your ID Document") {
          $("#id_document").attr("value", "");
        }
      });
    }
    $("#id_document").blur(function () {
      if ($("#id_document").attr("value") == "") {
        $("#id_document").attr("value", "Introduce your ID Document");
      }
    });


    if ($("#phone").attr("value") == "") {
      $("#phone").attr("value", "Introduce phone number");
      $("#phone").focus(function () {
        if ($("#phone").attr("value") == "Introduce phone number") {
          $("#phone").attr("value", "");
        }
      });
    }
    $("#phone").blur(function () {
      if ($("#phone").attr("value") == "") {
        $("#phone").attr("value", "Introduce phone number");
      }
    });


    if ($("#email").attr("value") == "") {
      $("#email").attr("value", "Introduce your email");
      $("#email").focus(function () {
        if ($("#email").attr("value") == "Introduce your email") {
          $("#email").attr("value", "");
        }
      });
    }
    $("#email").blur(function () {
      if ($("#email").attr("value") == "") {
        $("#email").attr("value", "Introduce your email");
      }
    });


    if ($("#date_birthday").attr("value") == "") {
      $("#date_birthday").attr("value", "Introduce your date birhday");
      $("#date_birthday").focus(function () {
        if ($("#date_birthday").attr("value") == "Introduce your date birhday") {
          $("#date_birthday").attr("value", "");
        }
      });
    }
    $("#date_birthday").blur(function () {
      if ($("#date_birthday").attr("value") == "") {
        $("#date_birthday").attr("value", "Introduce your date birhday");
      }
    });

  });//each
  return this;

};//function


Dropzone.autoDiscover = false;
$(document).ready(function () {

  $('#date_birthday').datepicker({
    dateFormat: 'dd/mm/yy',
    changeMonth: true,
    changeYear: true,
    yearRange: '0:+2',
    onSelect: function(selectedDate) {

    }
  });

  $("#dropzone").dropzone({

    url: "../users/upload",
    params: {'upload':true},
    addRemoveLinks: true,
    maxFileSize: 1000,
    dictResponseError: "An error has occurred on the server",
    acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd',
    init: function () {

      this.on("success", function (file, response) {

        //console.log('response:' + response);
        //console.log('file:' + file);

        $("#progress").show();
        $("#bar").width('100%');
        $("#percent").html('100%');
        $('.msg').text('').removeClass('msg_error');
        $('.msg').text('Success Upload image!!').addClass('msg_ok').animate({'right': '300px'}, 300);

      });

    },

    complete: function (file) {
      if(file.status == "success"){

        console.log("El archivo se ha subido correctamente: " + file.name);
        console.log(file.status);

      }
    },
    error: function (file) {
      console.log("Error subiendo el archivo " + file.name);
      console.log(file.status);
    },
    removedfile: function (file, serverFileName) {
      var name = file.name;

      $.ajax({
        type: "POST",
        //url: "modules/users/controller/controller_users.class.php?asd=true",
        data: "filename=" + name,
        success: function (data) {
          $("#bar").width('0%');
          $("#percent").html('0%');
          //$('.msg').text('').removeClass('msg_ok');
          //$('.msg').text('').removeClass('msg_error');
          $("#e_avatar").html("");

          var element;
          if ((element = file.previewElement) != null) {
            element.parentNode.removeChild(file.previewElement);
            //alert("Imagen eliminada: " + name);
          } else {
            false;
          }
        }

      });

    }

  });


  $(this).fill_or_clean(); //siempre que creemos un plugin debemos llamarlo, sino no funcionará

  var email_reg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
  var date_reg = /^(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](19|20)\d\d$/;
  var address_reg = /^[a-z0-9- -.]+$/i;
  var pass_reg = /^[0-9a-zA-Z]{6,32}$/;
  var string_reg = /^[A-Za-z]{2,30}$/;
  var usr_reg = /^[0-9a-zA-Z]{4,10}$/;
  var only_numbers = /^[1-9][0-9]*$/;
  var description_string = /^[A-Za-z]{10,30}$/;

  var name_regex = /^[a-zA-Z ]+$/;
  var dni_regex = /^\d{8}[a-zA-Z]$/;
  var phone_regex = /^[67][0-9]{8}$/;
  var email_regex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  var password_regex = /^(?=[^A-Z]*[A-Z])(?=[^a-z]*[a-z])(?=[^0-9]*[0-9]).{6,}$/;



  $("#SubmitUser").click(function () {

    var result = true;


    var name = document.getElementById('name').value;
    var surname = document.getElementById('surname').value;
    var id_document = document.getElementById('id_document').value;
    var phone = document.getElementById('phone').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var repeat_password = document.getElementById('repeat_password').value;
    var date_birthday = document.getElementById('date_birthday').value;



    var pais = $("#pais").val();
    var provincia = $("#provincia").val();
    var poblacion = $("#poblacion").val();



    var gender = [];
    var inputElementsQuality = document.getElementsByClassName('messageRadio');
    var h = 0;
    for (var i = 0; i < inputElementsQuality.length; i++) {
      if (inputElementsQuality[i].checked) {
        gender[h] = inputElementsQuality[i].value;
        h++;
      }
    }

    var interests = [];
    var inputElements = document.getElementsByClassName('messageCheckbox');
    var j = 0;
    for (var i = 0; i < inputElements.length; i++) {
      if (inputElements[i].checked) {
        interests[j] = inputElements[i].value;
        j++;
      }
    }

    // validacions en regex

    $(".error").remove();
    if ($("#name").val() == "" || $("#name").val() == "Introduce name") {
      $("#name").focus().after("<span class='error'>Introduce name</span>");
      result = false;
      return false;
    } else if (!name_regex.test($("#name").val())) {
      $("#name").focus().after("<span class='error'> Name must be 4 to 10 letters</span>");
      result = false;
      return false;
    }

    if ($("#surname").val() == "" || $("#surname").val() == "Introduce surname") {
      $("#surname").focus().after("<span class='error'>Introduce surname</span>");
      result = false;
      return false;
    } else if (!name_regex.test($("#surname").val())) {
      $("#surname").focus().after("<span class='error'> Name must be 4 to 10 letters</span>");
      result = false;
      return false;
    }


    else if ($("#id_document").val() == "" || $("#id_document").val() == "Introduce ID Document") {
      $("#id_document").focus().after("<span class='error'>Introduce the ID Document</span>");
      result = false;
      return false;
    } else if(!dni_regex.test($("#id_document").val())){
      $("#id_document").focus().after("<span class='error'> Introduce correctly the ID Document</span>");
      result = false;
      return false;
    }else{
      var numero
      var letr
      var letra
      numero = id_document.substr(0,id_document.length-1);
      letr = id_document.substr(id_document.length-1,1);
      numero = numero % 23;
      letra='TRWAGMYFPDXBNJZSQVHLCKET';
      letra=letra.substring(numero,numero+1);
      if (letra!=letr.toUpperCase()) {
        $("#id_document").focus().after("<span class='error'> Incorrect word</span>");
        result = false;
        return false;
      }
    }

    if ($("#phone").val() == "" || $("#phone").val() == "Introduce a phone number") {
      $("#phone").focus().after("<span class='error'>Introduce a valid phone number</span>");
      result = false;
      return false;
    } else if (!phone_regex.test($("#phone").val())) {
      $("#phone").focus().after("<span class='error'>Introduce a valid phone number</span>");
      result = false;
      return false;
    }

    else if ($("#email").val() == "" || $("#email").val() == "Introduce an email") {
      $("#email").focus().after("<span class='error'>Introduce a valid email</span>");
      result = false;
      return false;
    } else if (!email_regex.test($("#email").val())) {
      $("#email").focus().after("<span class='error'>Introduce a valid email</span>");
      result = false;
      return false;
    }

    else if ($("#password").val() == "" || $("#password").val() == "Introduce a valid password") {
      $("#password").focus().after("<span class='error'>At least 1 upper and lower case and one number</span>");
      result = false;
      return false;
    } else if (!password_regex.test($("#password").val())) {
      $("#password").focus().after("<span class='error'>At least 1 upper and lower case and one number</span>");
      result = false;
      return false;
    }

    else if ($("#repeat_password").val() == "" || $("#repeat_password").val() == "Introduce a valid password") {
      $("#repeat_password").focus().after("<span class='error'>At least 1 upper and lower case and one number</span>");
      result = false;
      return false;
    } else if (!password_regex.test($("#repeat_password").val())) {
      $("#repeat_password").focus().after("<span class='error'>At least 1 upper and lower case and one number</span>");
      result = false;
      return false;
    }

    else if($("#password").val() != $("#repeat_password").val()){
      $("#repeat_password").focus().after("<span class='error'>Passwords are not equal</span>");
      result = false;
      return false;
    }

    else if ($("#date_birthday").val() == "" || $("#date_birthday").val() == "Introduce your birthdate") {
      $("#date_birthday").focus().after("<span class='error'>More than 18 years old</span>");
      result = false;
      return false;
    } else if (!date_reg.test($("#date_birthday").val())) {
      $("#date_birthday").focus().after("<span class='error'>More than 18 years old</span>");
      result = false;
      return false;
    }

    else if ($("#pais").val() == "" || $("#pais").val() == "Select a country") {
      $("#pais").focus().after("<span class='error'>Select a country</span>");
      result = false;
      return false;
    }

    if($("#pais").val() == "ES" && $("#provincia").val() == ""){
      $("#provincia").focus().after("<span class='error'>Select a Province</span>");
      result = false;
      return false;
    }
    if(pais == "ES" && $("#provincia").val() == "Select a Province"){
      $("#provincia").focus().after("<span class='error'>Select a Province</span>");
      result = false;
      return false;
    }

    if($("#pais").val() == "ES" && $("#poblacion").val() == ""){
      $("#poblacion").focus().after("<span class='error'>Select a city</span>");
      result = false;
      return false;
    }else if(pais == "ES" && $("#poblacion").val() == "Select a city"){
      $("#poblacion").focus().after("<span class='error'>Select a city</span>");
      result = false;
      return false;
    }
    /**
    console.log("name" + name + "id_document" + id_document + "phone" + phone +
    "email" + email + "password" + password + "repeat_password" + repeat_password + "interests" + interests +
    "gender" + gender + "date_birthday" + date_birthday + "pais" + pais + "provincia" + provincia + "poblacion" + poblacion);
    console.log("result:" + result);
    */
    if (result) {

      var data = {"name": name, "surname": surname, "id_document": id_document,
      "phone": phone, "email": email, "password": password, "repeat_password": repeat_password,
      "interests": interests, "gender": gender, "date_birthday": date_birthday, "pais": pais,
      "provincia": provincia, "poblacion": poblacion};

      //console.log(data);

      var data_users_JSON = JSON.stringify(data);
      //console.log("Entra result users.js");
      //console.log(data_users_JSON);

      $.post('../../users/alta_users',
      {alta_users_json: data_users_JSON},
      function (response) {
        console.log("response:");
        console.log(response);

        if (response.success) {
          console.log("Entra response success");
          window.location.href = response.redirect;
        }

      }, "json").fail(function (xhr) {

        if (xhr.responseJSON == 'undefined' && xhr.responseJSON == null)
        xhr.responseJSON = JSON.parse(xhr.responseText);

        if (xhr.responseJSON.error.name)
        $("#e_name").focus().after("<span>" + xhr.responseJSON.error.name + "</span>");

        if (xhr.responseJSON.error.surname)
        $("#e_surname").focus().after("<span>" + xhr.responseJSON.error.surname + "</span>");

        if (xhr.responseJSON.error.id_document)
        $("#e_id_document").focus().after("<span>" + xhr.responseJSON.error.id_document + "</span>");

        if (xhr.responseJSON.error.phone)
        $("#e_phone").focus().after("<span>" + xhr.responseJSON.error.phone + "</span>");

        if (xhr.responseJSON.error.email)
        $("#e_email").focus().after("<span>" + xhr.responseJSON.error.email + "</span>");

        if (xhr.responseJSON.error.password)
        $("#e_password").focus().after("<span>" + xhr.responseJSON.error.password + "</span>");

        if (xhr.responseJSON.error.repeat_password)
        $("#e_repeat_password").focus().after("<span>" + xhr.responseJSON.error.repeat_password + "</span>");

        if (xhr.responseJSON.error.interests)
        $("#e_interests").focus().after("<span>" + xhr.responseJSON.error.interests + "</span>");

        if (xhr.responseJSON.error.gender)
        $("#e_gender").focus().after("<span  class='error1'>" + xhr.responseJSON.error.gender + "</span>");

        if (xhr.responseJSON.error.date_birthday)
        $("#e_date_birthday").focus().after("<span class='error1'>" + xhr.responseJSON.error.date_birthday + "</span>");

        if (xhr.responseJSON.error.pais)
        $("#e_pais").focus().after("<span  class='error1'>" + xhr.responseJSON.error.pais + "</span>");

        if (xhr.responseJSON.error.provincia)
        $("#e_provincia").focus().after("<span  class='error1'>" + xhr.responseJSON.error.provincia + "</span>");


        if (xhr.responseJSON.error.poblacion) {
          $("#e_poblacion").focus().after("<span  class='error1'>" + xhr.responseJSON.error.poblacion + "</span>");
        }

        if (xhr.responseJSON.error_avatar)
        $("#dropzone").focus().after("<span  class='error1'>" + xhr.responseJSON.error_avatar + "</span>");

        if (xhr.responseJSON.success1) {
          if (xhr.responseJSON.img_avatar !== "./media/default-avatar.png") {

          }
        } else {
          $("#progress").hide();
          $('.msg').text('').removeClass('msg_ok');
          $('.msg').text('Error Upload image!!').addClass('msg_error').animate({'right': '300px'}, 300);
        }
      });
    }



  });

  /**
  * LOAD COUNTRIES
  */

  load_countries_v1();
  $("#provincia").empty();
  $("#provincia").append('<option value="" selected="selected">Selecciona una Provincia</option>');
  $("#provincia").prop('disabled', true);
  $("#poblacion").empty();
  $("#poblacion").append('<option value="" selected="selected">Selecciona una Poblacion</option>');
  $("#poblacion").prop('disabled', true);

  $("#pais").change(function() {
    var pais = $(this).val();
    var provincia = $("#provincia");
    var poblacion = $("#poblacion");

    if(pais !== 'ES'){
      provincia.prop('disabled', true);
      poblacion.prop('disabled', true);
      $("#provincia").empty();
      $("#poblacion").empty();
    }else{
      provincia.prop('disabled', false);
      poblacion.prop('disabled', false);
      load_provincias_v1();
    }//fi else
  });

  $("#provincia").change(function() {
    var prov = $(this).val();
    if(prov > 0){
      load_poblaciones_v1(prov);
    }else{
      $("#poblacion").prop('disabled', false);
    }
  });

});


function load_countries_v2(cad) {
  $.post(cad, function(data) {
    //$.getJSON( cad, function(data) {

    console.log(cad);

    $("#pais").empty();
    $("#pais").append('<option value="" selected="selected">Selecciona un Pais</option>');

    $.each(data, function (i, valor) {
      $("#pais").append("<option value='" + valor.sISOCode + "'>" + valor.sName + "</option>");
    });

  })
  .fail(function() {
    alert( "error load_countries" );
  });
}

function load_countries_v1() {
  $.post( "../../users/load_pais/", {'pais':true},
  function(response) {

    console.log(response);

    if(response === 'error'){
      load_countries_v2("../../resources/ListOfCountryNamesByName.json");
    }else{
      load_countries_v2("../../users/load_pais/", {'pais':true});
    }
  })
  .fail(function(response) {
    load_countries_v2("../../../resources/ListOfCountryNamesByName.json");
  });
}

function load_provincias_v2() {
  $.post("../../resources/provinciasypoblaciones.xml", function (xml) {
    $("#provincia").empty();
    $("#provincia").append('<option value="" selected="selected">Selecciona una Provincia</option>');

    $(xml).find("provincia").each(function () {
      var id = $(this).attr('id');
      var nombre = $(this).find('nombre').text();
      $("#provincia").append("<option value='" + id + "'>" + nombre + "</option>");
    });
  })
  .fail(function() {
    alert( "error load_provincias" );
  });
}

function load_provincias_v1() {
  $.post( "../../users/load_provincias", {'provincias':true},
  function( response ) {
    $("#provincia").empty();
    $("#provincia").append('<option value="" selected="selected">Selecciona una Provincia</option>');

    //console.log(response);
    var json = JSON.parse(response);
    var provincias=json.provincias;
    //alert(provincias);
    console.log(provincias);

    //alert(provincias[0].id);
    //alert(provincias[0].nombre);

    if(provincias === 'error'){
      load_provincias_v2();
    }else{
      for (var i = 0; i < provincias.length; i++) {
        $("#provincia").append("<option value='" + provincias[i].id + "'>" + provincias[i].nombre + "</option>");
      }
    }
  })
  .fail(function(response) {
    load_provincias_v2();
  });
}

function load_poblaciones_v2(prov) {
  $.post("../../resources/provinciasypoblaciones.xml", function (xml) {
    $("#poblacion").empty();
    $("#poblacion").append('<option value="" selected="selected">Selecciona una Poblacion</option>');

    $(xml).find('provincia[id=' + prov + ']').each(function(){
      $(this).find('localidad').each(function(){
        $("#poblacion").append("<option value='" + $(this).text() + "'>" + $(this).text() + "</option>");
      });
    });
  })
  .fail(function() {
    alert( "error load_poblaciones" );
  });
}

function load_poblaciones_v1(prov) { //provinciasypoblaciones.xml - xpath
  var datos = { idPoblac : prov  };
  $.post("../../users/idPoblac", datos, function(response) {
    var json = JSON.parse(response);
    var poblaciones=json.poblaciones;
    //alert(poblaciones);
    //console.log(poblaciones);
    //alert(poblaciones[0].poblacion);

    $("#poblacion").empty();
    $("#poblacion").append('<option value="" selected="selected">Selecciona una Poblacion</option>');

    if(poblaciones === 'error'){
      load_poblaciones_v2(prov);
    }else{
      for (var i = 0; i < poblaciones.length; i++) {
        $("#poblacion").append("<option value='" + poblaciones[i].poblacion + "'>" + poblaciones[i].poblacion + "</option>");
      }
    }
  })
  .fail(function() {
    load_poblaciones_v2(prov);
  });
}
