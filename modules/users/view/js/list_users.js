$(document).ready(function () {
  load_users_get_v2();
});

function load_users_get_v2() {
  var jqxhr = $.post("../../users/load_users/",{'load':true}, function (data) {

    var json = JSON.parse(data);

    pintar_user(json);
  });
}

function pintar_user(data) {
  var content = document.getElementById("content");
  var div_user = document.createElement("div");
  var parrafo = document.createElement("p");

  for (var name_data in data.user) {

    if(name_data != 'name'){
      var dat = document.createElement("div");
      dat.innerHTML = name_data + " = " + data[name_data];
      parrafo.appendChild(dat);
    }else{
      for (var name_user in data.user){
        date_print(name_user, data.user[name_user]);
      }
    }
  }
  div_user.appendChild(parrafo);
  content.appendChild(div_user);

  function date_print(names, dates) {
    if (names === 'avatar' || names === 'interests') {
      if (names === 'avatar') {
        var img = document.createElement("div");
        var cad = dates;
        var html = '<img src="../../' + cad + '" height="75" width="75"> ';
        img.innerHTML = html;
        parrafo.appendChild(img);
      } else {
        var interests = document.createElement("div");
        interests.innerHTML = "interests = ";
        for (var i = 0; i < data.user.interests.length; i++) {
          interests.innerHTML += " - " + data.user.interests[i];
        }
        parrafo.appendChild(interests);
      }
    } else {
      var date = document.createElement("div");
      date.innerHTML = names + " = " + dates;
      parrafo.appendChild(date);
    }
  }

}
