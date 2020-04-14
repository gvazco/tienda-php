<!--=====================================
FOOTER
======================================-->

<footer class="container-fluid">

	<div class="container">

		<div class="row">

		 	<!--=====================================
			CATEGORÍAS Y SUBCATEGORÍAS FOOTER
			======================================-->

			<div class="col-xs-12 footerCategorias p-3" style="display: contents;">

				<?php

				$url = Ruta::ctrRuta();

				$item = null;
				$valor = null;

				$categorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

				foreach ($categorias as $key => $value) {

					if($value["estado"] != 0){

						echo '<div class="col-md-4 col-sm-6 col-xs-12">

						<h4><a href="'.$url.$value["ruta"].'" class="pixelCategorias text-secondary" titulo="'.$value["titulo"].'">'.$value["titulo"].'</a></h4>

						<hr>

						<ul>';

						$item = "id_categoria";

						$valor = $value["id"];

						$subcategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

						foreach ($subcategorias as $key => $value) {

							if($value["estado"] != 0){

								echo '<li><a href="'.$url.$value["ruta"].'" class="pixelSubCategorias text-secondary" titulo="'.$value["subcategoria"].'">'.$value["subcategoria"].'</a></li>';

							}

						}

						echo '</ul>

						</div>';

					}

				}

				?>

			</div>

		</div>

		<hr>

		<div class="row mt-2">

			<!--=====================================
			DATOS CONTACTO
			======================================-->

			<div class="col-md-6 col-xs-12 text-left infoContacto">
				
				<h5 class="text-secondary">Dudas y sugerencias, contáctenos en:</h5>
				
				<h6 class="text-secondary mt-3">

					<i class="fa fa-phone-square" aria-hidden="true"></i> (55) 4323-4011

					<br><br>
					
					<i class="fab fa-whatsapp" aria-hidden="true"></i> (55) 8185-3675

					<br><br>

					<i class="fa fa-envelope" aria-hidden="true"></i> ventas@techosymantenimientos.com.mx

					<br><br>

					<i class="fa fa-map-marker" aria-hidden="true"></i> Ricardo Flores Magón N.105 C.P.53689

					<br><br>
					Izcalli Chamapa | Naucalpan, EdoMex.

				</h6>

				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.3418884011367!2d-99.28426568593876!3d19.440820986879718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d204091ccd34f7%3A0x4780021848091d3e!2sTechos%20y%20Mantenimientos%20Industriales%20%7C%20Mevasa%20Comercializadora!5e0!3m2!1ses-419!2smx!4v1569427486686!5m2!1ses-419!2smx" width="85%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

			</div>

			<!--=====================================
			FORMULARIO CONTÁCTENOS
			======================================-->

			<div class="col-md-6 col-xs-12 mt-lg-4 formContacto">
				
				<h4 class="text-secondary mt-sm-3 mb-4">RESUELVA SU INQUIETUD</h4>

				<form role="form" method="post" onsubmit="return validarContactenos()">

					<input type="text" id="nombreContactenos" name="nombreContactenos" class="form-control" placeholder="Escriba su nombre" required> 

					<br>

					<input type="email" id="emailContactenos" name="emailContactenos" class="	form-control" placeholder="Escriba su correo electrónico" required>  

					<br>

					<textarea id="mensajeContactenos" name="mensajeContactenos" class="form-control" placeholder="Escriba su mensaje" rows="5" required></textarea>

					<br>

					<input type="submit" value="Enviar" class="btn btn-default backColor pull-right" id="enviar">         

				</form>

			</div>
			
		</div>

	</div>

</footer>

<!--=====================================
FINAL
======================================-->

<div class="container-fluid final barraSuperior">
	
	<div class="container">

		<div class="row">
			
			<div class="col-md-8 col-sm-12 mt-3 text-left text-muted">
				
				<h6>&copy; 2019 Todos los derechos reservados. Sitio elaborado por Disturbio Ilustrativo</h6>

			</div>

			<div class="col-md-4 col-sm-12 mt-3 text-right social">
				
				<ul>

					<?php 

					$redesSociales = json_decode($plantilla["redesSociales"], true);

					foreach ($redesSociales as $key => $value) {

						echo '<li>
						<a href="'.$value["url"].'" target="_blank">
						<i class="'.$value["icono"].' lead text-white mr-1"></i>
						</a>
						</li>';
					}

					?>


				</ul>

			</div>

		</div>

	</div>

</div>

<div class="fachat" id="fb-root"></div>
<script>
	window.fbAsyncInit = function() {
		FB.init({
			xfbml            : true,
			version          : 'v4.0'
		});
	};

	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<!-- Your customer chat code -->
	<div class="fb-customerchat"
	attribution=setup_tool
	page_id="349912151786182"
	logged_in_greeting="Hola, en qué podemos servirte?"
	logged_out_greeting="Hola, en qué podemos servirte?">
</div>




