<script src="<?php echo CONTACT_LIB_PATH; ?>bootstrap-button.js"></script>
<script src="<?php echo USERS_JS_PATH . "newpass.js" ?>"></script>

<br>
<div class="container">
    <form id="changepass_form" name="changepass_form" class="form-contact">
        <br />
        <div class="form-title"><h2 class="form-contact-heading">Cambia tu contraseña</h2></div>
        <p>Por favor introduce tu nueva contraseña.</p>
        <br>
        <div class="control-group">
            <input type="password" id="password" name="password" placeholder="Password" class="input-block-level" maxlength="100">
        </div><br>
        <div class="control-group">
            <input type="password" id="password2" name="password2" placeholder="Repit your Password" class="input-block-level" maxlength="100">
        </div><br>

        <input class="btn btn-primary" type="button" name="submit" id="changeBtn" value="Enviar"/>
        <br>
        <img src="<?php echo CONTACT_IMG_PATH; ?>ajax-loader.gif" alt="ajax loader icon" class="ajaxLoader" /><br/><br/>

        <div id="resultMessage" style="display: none;"></div>
    </form>
</div> <!-- /container -->
