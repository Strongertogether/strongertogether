<link href="<?php echo USERS_CSS_PATH ?>login.css" rel="stylesheet">
<div class="login-page">
  <div class="form">
    <form class="login-form">
      <input type="text" placeholder="username"/>
      <input type="password" placeholder="password"/>
      <input class="button" type="button" name="submitLog" id="submitLog"  value="Login" />
      <p class="message">Not registered? <a href="<?php amigable('?module=users&function=signup'); ?>">Create an account</a></p>
      <p class="message">Forgot your password? <a href="#" >Click Here!</a></p><br>
    </form>
  </div>
</div>
