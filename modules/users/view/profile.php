<!--- Lateral Izquierdo --->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js"></script>
<script src="<?php echo USERS_JS_PATH . "profile.js" ?>"></script>
<div class="container">
    <form class="well form-horizontal" action=" " method="post"  id="profile_form">
<fieldset>

<!-- Form Name -->
<legend>Profile</legend>

<!-- Text input-->
<h3 class="form-profile-heading" id="username">UserName</h3>
<div class="user-avatar">
  <img id="avatar" src="" />
 <span id="e_avatar" class="styerror"></span>
 <div id="progress">
     <div id="bar"></div>
     <div id="percent"></div>
 </div>
 <div class="msg"></div>
 <br/>
 <div id="dropzone" class="dropzone"></div>
</div><br><br>

<!-- name-->
<div class="form-group">
  <label class="col-md-4 control-label">Name</label>
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  id="name" name="name" placeholder="Name" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- surname-->

<div class="form-group">
  <label class="col-md-4 control-label" >Surname</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input id="surname" name="surname" placeholder="Surname" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- password-->

<div class="form-group">
  <label class="col-md-4 control-label" >Password</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input id="password" name="password" placeholder="password" class="form-control"  type="password">
    </div>
  </div>
</div>

<!-- repeat password-->

<div class="form-group">
  <label class="col-md-4 control-label" >Repeat Password</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input id="repeat_password" name="repeat_password" placeholder="repeat password" class="form-control"  type="password">
    </div>
  </div>
</div>

<!-- telefono-->

<div class="form-group">
  <label class="col-md-4 control-label">Phone </label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input id="phone" name="phone" placeholder="Number Phone" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Date Birthday</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  <input id="date_birthday" name="date_birthday" placeholder="Date Birthday" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Poblacion -->

<div class="form-group">
  <label class="col-md-4 control-label">City</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select id="poblacion" name="poblacion" class="form-control selectpicker" >
    </select>
  </div>
</div>
</div>

<!-- provincia -->

<div class="form-group">
  <label class="col-md-4 control-label">Province</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select id="provincia" name="provincia" class="form-control selectpicker" >
    </select>
  </div>
</div>
</div>

<!-- PAIS -->

<div class="form-group">
  <label class="col-md-4 control-label">Country</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select id="pais" name="pais" class="form-control selectpicker" >
    </select>
  </div>
</div>
</div>

<!-- DNI -->

<div class="form-group">
  <label class="col-md-4 control-label">ID Document</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
  <input id="id_document" name="id_document" placeholder="ID Document(DNI)" class="form-control"  type="text">
    </div>
</div>
</div>
<!-- Intereses-->
<div class="form-group">
                       <label class="col-md-4 control-label">Interests:</label>
                       <div class="col-md-4">
                           <div class="radio">
                               <label>
                                   <input type="checkbox" id="internet" name="interests[]" class="messageCheckbox" value="internet">Internet</input>
                               </label>
                           </div>
                           <div class="radio">
                               <label>
                                   <input type="checkbox" id="art" name="interests[]" class="messageCheckbox" value="art">Art</input>
                               </label>
                           </div>
                           <div class="radio">
                               <label>
                                   <input type="checkbox" id="technology" name="interests[]" class="messageCheckbox" value="technology">Technology</input>
                               </label>
                           </div>
                           <div class="radio">
                               <label>
                                   <input type="checkbox" id="literature" name="interests[]" class="messageCheckbox" value="literature">Literature</input>
                               </label>
                           </div>
                           <div class="radio">
                               <label>
                                   <input type="checkbox" id="music" name="interests[]" class="messageCheckbox" value="music">Music</input>
                               </label>
                           </div>
                           <div class="radio">
                               <label>
                                   <input type="checkbox" id="other" name="interests[]" class="messageCheckbox" value="other">Other</input>
                               </label>
                           </div>
                       </div>
                   </div>

<!-- sexo -->
 <div class="form-group">
                        <label class="col-md-4 control-label">Gender</label>
                        <div class="col-md-4">
                            <div class="radio">
                                <label>
                                    <input type="radio" id="male" name="gender" value="male" class="messageRadio"/> Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" id="female" name="gender" value="female" class="messageRadio"/> Female
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" id="undefined" name="gender" value="undefined" class="messageRadio"/> Other
                                </label>
                            </div>
                        </div>
                    </div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button id="SubmitUser" type="submit" class="btn btn-warning" >Save Profile <span class="glyphicon glyphicon-floppy-disk"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->
