<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js"></script>
<script type="text/javascript" src="<?php echo USERS_JS_PATH ?>users.js" ></script>

<form id="form_users" name="form_users">
  <br>
  <br>
  <table width="70%" align="center">
    <tr><td><h2>Registration Form</h2></td></tr>
    <tr>
      <td>Name</td>
      <td>
        <input type="text" id="name" name="name" placeholder="Name" required="required" value="" >
        <div id="e_name"></div>
      </td>
    </tr>

    <tr>
      <td>Surname</td>
      <td>
        <input type="text" id="surname" name="surname" placeholder="Surname" required="required" value="" >
        <div id="e_surname"></div>
      </td>
    </tr>


    <tr>
      <td>ID Document</td>
      <td><input type="text" name="id_document" placeholder="Id users" id="id_document" value="" >
        <div id="e_id_document"></div>
      </td>
    </tr>

    <tr>
      <td>Phone Number</td>
      <td><input type="number" name="phone" placeholder="Phone" id="phone" value="" >
        <div id="e_phone"></div>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td>
        <input type="text" id="email" name="email" placeholder="Email" required="required" value="" >
        <div id="e_email"></div>
      </td>
    </tr>
    <tr>
      <td>Password</td>
      <td>
        <input type="password" id="password" name="password" placeholder="Password" required="required" value="" >
        <div id="e_password"></div>
      </td>
    </tr>
    <tr>
      <td>Repeat Password</td>
      <td>
        <input type="password" id="repeat_password" name="repeat_password" placeholder="Repeat Password" required="required" value="" >
        <div id="e_repeat_password"></div>
      </td>
    </tr>

    <tr>
      <td>Interests</td>
      <td>
        <input type="checkbox" id="interests[]" name="interests[]" class="messageCheckbox" value="internet">Internet</input>
        <input type="checkbox" id="interests[]" name="interests[]" class="messageCheckbox" value="art">Art</input>
        <input type="checkbox" id="interests[]" name="interests[]" class="messageCheckbox" value="technology">Technology</input><br>
        <input type="checkbox" id="interests[]" name="interests[]" class="messageCheckbox" value="literature">Literature</input>
        <input type="checkbox" id="interests[]" name="interests[]" class="messageCheckbox" value="music">Music</input>
        <input type="checkbox" id="interests[]" name="interests[]" class="messageCheckbox" value="other">Other</input><br>
        <div id="e_interests"></div>
      </td>
      <td>
      </td>
    </tr>

    <tr>
      <td>Gender</td><td>
        <input type="radio" id="gender" name="gender" value="male" class="messageRadio">Male</input>
        <input type="radio" id="gender" name="gender" value="female" class="messageRadio">Female</input>
        <input type="radio" id="gender" name="gender" value="undefined" class="messageRadio">Undefined</input>
        <div id="e_gender"></div>
      </td>
      <td>
      </td>
    </tr>

    <tr>
      <td>Date Birthday</td>
      <td>
        <input id="date_birthday" type="text" placeholder="dd/MM/yyyy" name="date_birthday" readonly="readonly" value="" >
        <div id="e_date_birthday"></div>
      </td>
    </tr>

    <tr>
      <td>
        <p>
          <label for="pais">Pais</label>
          <select id="pais">
          </select>
          <span id="e_pais" class="styerror"></span>
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <p>
          <label for="provincia">Provincia</label>
          <select id="provincia">
          </select>
          <span id="e_provincia" class="styerror"></span>
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <p>
          <label for="poblacion">Poblacion</label>
          <select id="poblacion">
          </select>
          <span id="e_poblacion" class="styerror"></span>
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <div class="form-group" id="progress">
          <div id="bar"></div>
          <div id="percent">0%</div >
          </div>
          <div class="msg"></div>
          <br/>
          <div id="dropzone" class="dropzone"></div><br/>
          <br/>
          <br/>
          <div class="form-group">
            <span id="e_avatar" class="styerror"></span>
          </td>
        </tr>

        <tr>
          <td><button type="button" id="SubmitUser" name="SubmitUser" value="Submit">Submit</button></td>
        </tr>


      </table>

    </form>
