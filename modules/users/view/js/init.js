$(document).ready(function () {

  var user = Tools.readCookie("user");
  if (user) {

    user = user.split("|");
    console.log(user);

    $("#LogProf").html("<a href=" + amigable2('?module=users&function=profile') + "><img id='menuImg' class='icon rounded' src='" + user[1] + "'/>" + user[3] + "</a>");
    $("#LogProf").after("<li><a id='logout' href='#' >Log Out</a></li>");

    //Envie els usuaris de tipo worker o client a la vista main

    if ( (user[2] === "worker") || (user[2] === "client")  ) {
      console.log(user[2] + " going to main module");
      $("#LogProf").before("<li><a href=" + amigable2('?module=main') + ">Mis ofertas</a></li>")

    //Envie els usuaris de tipo admin a la vista main

    } else if (user[2] === "admin") {
      console.log(user[2] + " going to main module");
      $("#LogProf").before("<li><a href=" + amigable2('?module=main') + ">Administrar</a></li>")
    }

    //No se exactament on esta $("head"), per a fer funcionar el logout
    $("head").append("https://92.222.94.202/var/www/html/Strongertogether/modules/users/view/js/logout.js");
  }

  var url = window.location.href;

  url = url.split("/");


  //missatge del alert banner
  var login = "<a href='#alertbanner' class='alertbanner'>Usuario logeado correctamente</div>";
  var registro = "<a href='#alertbanner' class='alertbanner'>Se le ha enviado un email para verificar su cuenta</div>";
  var password = "<a href='#alertbanner' class='alertbanner'>Se ha cambiado satisfactoriamente su contraseña</div>";
  var email_verificado = "<a href='#alertbanner' class='alertbanner'>Su email ha sido verificado, disfrute de nuestros servicios</div>";
  var problema_db = "<a href='#alertbanner' class='alertbanner alertbannerErr'>Hay un problema en la base de datos, inténtelo más tarde</div>";
  var update_profile = "<a href='#alertbanner' class='alertbanner'>Usuario correctamente actualizado</div>";


  //depenent de la sintaxis de la URL enviarem un missatge al alert banner o un altre
  if (url[4] === "main") {
    if (url[5] === "begin"){
      if (url[6] === "reg"){
        $("#alertbanner").html(registro);
      }else{
        $("#alertbanner").html(login);
      }
    }else if (url[6] === "rest"){
      $("#alertbanner").html(password);
    }
  }




  /*
  if (url[6] === "activar" && url[7].substring(0, 3) == "Ver"){
  $("#alertbanner").html("<a href='#alertbanner' class='alertbanner'>Su email ha sido verificado, disfrute de nuestros servicios</div>");
}else if(url[7]==="503"){
$("#alertbanner").html("<a href='#alertbanner' class='alertbanner alertbannerErr'>Hay un problema en la base de datos, inténtelo más tarde</div>");
}else if (url[6] === "begin") {
if (url[7] === "reg"){
$("#alertbanner").html("<a href='#alertbanner' class='alertbanner'>Se le ha enviado un email para verificar su cuenta</div>");
}else if (url[7] === "rest"){
$("#alertbanner").html("<a href='#alertbanner' class='alertbanner'>Se ha cambiado satisfactoriamente su contraseña</div>");
}
} else if (url[6] === "profile"){
if (url[7] === "done")
$("#alertbanner").html("<a href='#alertbanner' class='alertbanner'>Usuario correctamente actualizado</div>");
}
*/


});
