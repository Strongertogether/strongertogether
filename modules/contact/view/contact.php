	<!--banner-starts-->
	<script src="<?php echo CONTACT_LIB_PATH; ?>bootstrap-button.js"></script>
	<script src="<?php echo CONTACT_LIB_PATH; ?>jquery.validate.min.js"></script>
	<script src="<?php echo CONTACT_LIB_PATH; ?>jquery.validate.extended.js"></script>
	<script src="<?php echo CONTACT_JS_PATH; ?>contact.js"></script>
	<link href="<?php echo CONTACT_CSS_PATH; ?>bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo CONTACT_CSS_PATH; ?>custom.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
	<div class="banner-1">

	</div>
	<!--banner-end-->
<!--contact-->
	<div class="contact">
		<div class="container">
			<div class="contact-top heading">
				<h2>Contact Us</h2>
			</div>
			<div class="map-bottom">
					<div class="col-md-4 adrs-left">
						<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
						<p>StrongerTogether, Ontinyent IES L'Estació</p>
					</div>
					<div class="col-md-4 adrs-left adrs-middle">
						<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
						<p>+123 456 7890, +456 123 7890</p>
					</div>
					<div class="col-md-4 adrs-left adrs-right">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						<p><a href="mailto:example@email.com">strongtogether@gmail.com</a></p>
					</div>
					<div class="clearfix"></div>
				</div>
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d80478.53306167186!2d5.31346505!3d50.924565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c12183ded75db7%3A0xf7cb7b027e7e2181!2sHasselt%2C+Belgium!5e0!3m2!1sen!2sin!4v1435227092642" style="border:0" allowfullscreen=""></iframe>
			</div>
			<!--CONTACT FORM -->
			<div class="contact-bottom">
			    <form id="contact_form" name="contact_form"><br>

			        <div class="control-group">
			            <input type="text" id="inputName" name="inputName" placeholder="Name" dir="auto" maxlength="100">
			        </div>
			        <div class="control-group">
			            <input type="text" id="inputEmail" name="inputEmail" placeholder="Email *" maxlength="100">
			        </div>
			        <div class="control-group">
			            <label for="sel1">Subject</label>
			            <select class="form-control" id="inputSubject" name="inputSubject" title="Choose subject">
			                <option value="compra">Info relativa a tu compra</option>
			                <option value="evento">Celebra un evento con nosotros</option>
			                <option value="programacion">Contacta con nuestro dpto de programacion</option>
			                <option value="Trabaja">Trabaja con nosotros</option>
			                <option value="proyectos">Deseas proponernos proyectos</option>
			                <option value="sugerencias">Haznos sugerencias</option>
			                <option value="reclamaciones">Atendemos tus reclamaciones</option>
			                <option value="club">Club rural_shop</option>
			                <option value="sociales">Proyectos sociales</option>
			                <option value="festivos">Apertura de festivos</option>
			                <option value="novedades">Te avisamos de nuestras novedades</option>
			                <option value="diferente">Algo diferente</option>
			            </select>
			        </div>
			        <div class="control-group">
			              <textarea  rows="4" name="inputMessage" placeholder="Message *" style="max-width: 100%;" dir="auto"></textarea>
			        </div>

			        <input type="hidden" name="token" value="contact_form" />
							<div class="submit-btn">
			        <input  type="submit" name="submit" id="submitBtn" disabled="disabled" value="send" />
						</div>
			        <img src="<?php echo CONTACT_IMG_PATH; ?>ajax-loader.gif" alt="ajax loader icon" class="ajaxLoader" /><br/><br/>

			        <div id="resultMessage" style="display: none;"></div>
			    </form>
			</div> <!-- /container -->
		</div>
	</div>
<!--contact-->
