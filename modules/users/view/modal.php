<link href="<?php echo USERS_CSS_PATH ?>login.css" rel="stylesheet">
<script type="text/javascript" src="http://92.222.94.202/Strongertogether/modules/users/view/js/login.js"></script>
<div class="login-page">
  <div class="form">
    <form id="login_form" name="login_form" class="form-contact" align="center">
      <input type="text" id="inputUser" name="inputUser" placeholder="Usuario" class="input-block-level" dir="auto" maxlength="100">
      <input type="password" id="inputPass" name="inputPass" placeholder="Contraseña" class="input-block-level" maxlength="100">
      <button type="button" name="submitLog" id="submitLog" value="Enviar" >login</button>
      <p class="message">Not registered? <a href="<?php amigable('?module=users&function=signup'); ?>">Create an account</a></p>
      <p class="message">Forgot your password? <a href="#" >Click Here!</a></p><br>
    </form>
  </div>
</div>
<!-- Anterior modal

<style>
.modal-header{
  background-color: #061C33;
  text-align: center;
  padding: 9px;
}

.modal-header h4{
  color:#ffffff;
  margin: 0px;
}

#modalLog form{
  display: inline-block;
  width: 50%;
}

#modalLog .social{
  display: inline-block;
  max-width: 40%;
  vertical-align: top;
  padding-left: 27px;
}

ul.log{
  margin:0px;
}

ul.log li{
  display: inline-block;
  padding: 13px;
}
.modal-body{
  background-color: #e9f2fc;
}
.modal-body .btn{
  float: right;
}

.modal-body .separator{
  display: inline-block;
  min-width: 8%;
  text-align: center;
  color: #858585;
}
.modal-body .form-contact{
  padding-top: 15px;
}
#login_form .btn{
  margin-bottom: 8px;
}

.modal-footer{
  background-color: #061C33;
  color:#ffffff;
  text-align: center;
}

.modal-footer div{
  width: 100%;
}
.modal-body .reg p{
  text-align: center;
  margin-bottom: 1em;
}
.modal-body .reg a{
  font-weight: bold;
  text-decoration: underline;
}
</style>
<div class="modal-header">
  <script type="text/javascript" src="http://92.222.94.202/Strongertogether/modules/users/view/js/login.js"></script>
  <h4 class="modal-title" id="myModalLabel">Log In</h4>
</div>
<div class="modal-body" style="background-color: #36B6FF;" >
  <form id="login_form" name="login_form" class="form-contact" align="center">
    <div class="control-group">
      <input type="text" id="inputUser" name="inputUser" placeholder="Usuario" class="input-block-level" dir="auto" maxlength="100">
    </div>
    <div class="control-group">
      <input type="password" id="inputPass" name="inputPass" placeholder="Contraseña" class="input-block-level" maxlength="100">
    </div>

    <input class="btn btn-primary" type="button" name="submitLog" id="submitLog" value="Enviar" />
  </form>

<div class="col-md-4 head-left wow fadeInRight animated" data-wow-delay=".5s">
  <ul>
    <li>Login facebook and twitter: </li>
    <li><a href="#"><span class="fb"> </span></a></li>
    <li><a href="#"><span class="twit"> </span></a></li>
  </ul>
</div>
<div class="clearfix"></div>
<div class="form-contact reg ">
</div>
</div>
-->
