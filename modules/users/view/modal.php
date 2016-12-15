<link href="<?php echo USERS_CSS_PATH ?>login.css" rel="stylesheet">
<script src="<?php echo USERS_JS_PATH . "login.js" ?>"></script>
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
