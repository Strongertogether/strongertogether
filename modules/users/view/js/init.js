$(document).ready(function () {

    ////**user menu*///
    var user = Tools.readCookie("user");
    if (user) {

        user = user.split("|");
        console.log(user);
              
        $("#LogProf").html("<a href=" + amigable2('?module=users&function=profile') + "><img id='menuImg' class='icon rounded' src='" + user[1] + "'/>" + user[3] + "</a>");
        $("#LogProf").after("<li><a id='logout' href='#' >Log Out</a></li>");
        if ( (user[2] === "worker") || (user[2] === "client")  ) {
          console.log(user[2] + " going to main module");
            $("#LogProf").before("<li><a href=" + amigable2('?module=main') + ">Mis ofertas</a></li>")
        } else if (user[2] === "admin") {
            console.log(user[2] + " going to main module");
            $("#LogProf").before("<li><a href=" + amigable2('?module=main') + ">Administrar</a></li>")
        }
        //<script src= USERS_JS_PATH . "logout.js" ?></script>
        $("head").append("https://92.222.94.202/var/www/html/Strongertogether/modules/users/view/js/logout.js");
    }

    var url = window.location.href;

    url = url.split("/");
    console.log(url);
//    exit;
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

  if (url[4] === "main") {
      if (url[5] === "begin"){
        console.log("entra asdasddas");
          $("#alertbanner").html("<a href='#alertbanner' class='alertbanner'>Usuario logeado correctamente</div>");
      }else if (url[6] === "rest"){
          $("#alertbanner").html("<a href='#alertbanner' class='alertbanner'>Se ha cambiado satisfactoriamente su contraseña</div>");
      }
  }
});
