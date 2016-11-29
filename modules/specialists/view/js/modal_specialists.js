  $('.id_specialist').click(function () {
        var id = this.getAttribute('id');
        console.log(id);
        //alert(id);
        $.post("../../specialists/id/", {'idSpecialists': id}, function (data, status) {
            var json = JSON.parse(data);
            var specialists = json.specialists;
            console.log(specialists);

            $('#results').html('');
            $('.pagination').html('');

            var avatar = document.getElementById('avatar');
            avatar.innerHTML = '<img src="' + specialists.avatar + '" class="img-product"> ';
            var name = document.getElementById('name');
            name.innerHTML = specialists.name;
            var surname = document.getElementById('surname');
            surname.innerHTML = specialists.surname;
            var city = document.getElementById('city');
            city.innerHTML = "City: " + specialists.city;
            var specialty = document.getElementById('specialty');
            specialty.innerHTML = specialists.specialty;
            specialty.setAttribute("class", "special");

        })
                .fail(function (xhr) {
                  if (xhr.status === 404) {
                      $("#results").load("../../specialists/view_error_false/", {'view_error': false});
                  } else {
                      $("#results").load("../../specialists/view_error_true/", {'view_error': true});
                  }
                });
    });
