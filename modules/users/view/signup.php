<link href="<?php echo USERS_CSS_PATH ?>login.css" rel="stylesheet">
<script src="<?php echo USERS_JS_PATH . "signup.js" ?>"></script>
<div class="login-page">
  <div class="form">
    <form class="register-form">
      <input id="email" name="email" type="text" placeholder="Email address"/>
      <input id="pass" name="pass" type="password" placeholder="Password"/>
      <input id="pass2" name="pass2" type="password" placeholder="Confirm password"/>
      <input class="button" type="button" name="submitBtn" id="submitBtn"  value="Create" />
      <p class="message">Already registered? <a href="<?php amigable('?module=users&function=modal'); ?>">Sign In</a></p>
    </form>
  </div>
</div>
