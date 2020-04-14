<?php

$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();

/*=============================================
INICIO DE SESIÓN USUARIO
=============================================*/

if(isset($_SESSION["validarSesion"])){

	if($_SESSION["validarSesion"] == "ok"){

		echo '<script>
		
			localStorage.setItem("usuario","'.$_SESSION["id"].'");

		</script>';

	}

}

/*=============================================
API DE GOOGLE
=============================================*/

// https://console.developers.google.com/apis
// https://github.com/google/google-api-php-client

// /*=============================================
// CREAR EL OBJETO DE LA API GOOGLE
// =============================================*/

// $cliente = new Google_Client();
// $cliente->setAuthConfig('modelos/client_secret.json');
// $cliente->setAccessType("offline");
// $cliente->setScopes(['profile','email']);

// /*=============================================
// RUTA PARA EL LOGIN DE GOOGLE
// =============================================*/

// $rutaGoogle = $cliente->createAuthUrl();

// /*=============================================
// RECIBIMOS LA VARIABLE GET DE GOOGLE LLAMADA CODE
// =============================================*/

// if(isset($_GET["code"])){

// 	$token = $cliente->authenticate($_GET["code"]);

// 	$_SESSION['id_token_google'] = $token;

// 	$cliente->setAccessToken($token);

// }

// /*=============================================
// RECIBIMOS LOS DATOS CIFRADOS DE GOOGLE EN UN ARRAY
// =============================================*/

// if($cliente->getAccessToken()){

//  	$item = $cliente->verifyIdToken();

//  	$datos = array("nombre"=>$item["name"],
// 				   "email"=>$item["email"],
// 				   "foto"=>$item["picture"],
// 				   "password"=>"null",
// 				   "modo"=>"google",
// 				   "verificacion"=>0,
// 				   "emailEncriptado"=>"null");

//  	$respuesta = ControladorUsuarios::ctrRegistroRedesSociales($datos);

//  	echo '<script>
		
// 	setTimeout(function(){

// 		window.location = localStorage.getItem("rutaActual");

// 	},1000);

//  	</script>';

// }

?>

<!--=====================================
TOP
======================================-->

<div class="container-fluid barraSuperior" id="top">
	
	<div class="container">
		
		<div class="row">

			<!--=====================================
			REGISTRO
			======================================-->

			<div class="col-md-6 col-xs-12 registro">
				
				<ul>

					<?php 

					if(isset($_SESSION["validarSesion"])){

						if($_SESSION["validarSesion"] == "ok"){

							if($_SESSION["modo"] == "directo"){

								if($_SESSION["foto"] != ""){

									echo '<li>

									<a href="'.$url.'perfil"><img class="rounded-circle" src="'.$url.$_SESSION["foto"].'" width="5%">

									</li>';


								}else{

									echo '<li>

									<a href="'.$url.'perfil"><img class="rounded-circle" src="'.$servidor.'vistas/img/usuarios/default/anonymous.png" width="5%">

									</li>';

								}

								echo '
								<li><a href="'.$url.'perfil">VER PERFIL</li>
								<li>|</li>
								<li><a href="'.$url.'salir">SALIR</li>';

							}

						}

					}else{

						echo '<li><a href="#modalIngreso" data-toggle="modal">INGRESAR</a></li>
						<li>|</li>
						<li><a href="#modalRegistro" data-toggle="modal">CREAR UNA CUENTA</a></li>';

					}

					?>
					
					

				</ul>

			</div>	

			<!--=====================================
			SOCIAL
			======================================-->

			<div class="col-md-6 col-xs-12 social">
				
				<ul class="">

					<?php 

					$redesSociales = json_decode($plantilla["redesSociales"], true);

					foreach ($redesSociales as $key => $value) {

						echo '<li>
						<a href="'.$value["url"].'" target="_blank">
						<i class="'.$value["icono"].' lead mr-1"></i>
						</a>
						</li>';
					}

					?>

				</ul>

			</div>

		</div>	

	</div>

</div>

<!--=====================================
HEADER
======================================-->

<header class="container-fluid">
	
	<div class="container">
		
		<div class="row" id="cabezote">

			<!--=====================================
			LOGOTIPO
			======================================-->
			
			<div class="col-12 col-sm-3 col-lg-3 py-1 py-sm-3 logotipo" id="logotipo">
				
				<a href="<?php echo $url ?>">

					<img src="<?php echo $url ?>vistas/img/plantilla/logo.png" class="img-fluid pt-1">

				</a>
				
			</div>

			<!--=====================================
			CATEGORIAS Y BUSCADOR
			======================================-->

			<div class="col-12 col-sm-7 col-lg-6 pl-sm-4 pt-4">
				
				<div class="input-group mb-3" id="buscador">

					<div class="input-group-append">

						<button class="btn backColor" type="button" data-toggle="modal" data-target="#modalCategorias">

							<span class="float-left pt-1 mx-2 text-uppercase d-none d-md-block cat">Categorías</span>

							<span class="float-right mx-2 ">
								<i class="fas fa-bars text-white"></i>
							</span>

						</button> 

					</div>
					
					<input type="search" name="buscar" class="form-control" placeholder="Buscar...">

					<a href="<?php echo $url; ?>buscador/1/recientes">

						<div class="input-group-append">

							<button class="btn backColor" type="submit">

								<i class="fas fa-search"></i>

							</button> 

						</div>

					</a>

				</div>

			</div>	

			<!--=====================================
			CARRITO DE COMPRAS
			======================================-->

			<div class="col-12 col-lg-3 col-sm-2 pl-sm-2 pt-4" id="carrito">
				
				<a href="<?php echo $url; ?>carrito-de-compras">

					<button class="btn btn-default pull-left backColor"> 
						
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>

					</button>

				</a>	

				<p>TU CESTA <span class="cantidadCesta">0</span> <br> MXN $ <span class="sumaCesta">0</span></p>	

			</div>

		</div>

<!--=====================================
VENTANA MODAL CATEGORÍAS
======================================-->

<div class="modal" id="modalCategorias">
	
	<div class="modal-dialog modal-lg">
		
		<div class="modal-content rounded-0 border-0">

			<button type="button" class="btn btn-default pull-left text-info" data-dismiss="modal">Volver a la Tienda</button>

			<div class="modal-body p-0">

				<button type="button" class="close pr-2 d-sm-none" data-dismiss="modal">&times;</button>

				<div class="row">

					<!--=====================================
					CATEGORÍAS
					======================================-->
					
					<ul class="col-12 col-sm-6 col-lg-3 p-3 pl-4 listaCategorias">

						<?php

						$tabla = "categorias";
						$item = null;
						$valor = null;

						$categorias = ControladorCategorias::ctrMostrarCATySUB($tabla, $item, $valor);

						foreach ($categorias as $key => $value) {

							echo '<a href="'.$url.$value["ruta"].'" class="text-secondary">

							<li class="my-2" idCategoria="'.$value["id"].'">

							<span class="badge badge-pill">

							<img class="cat-icono" src="'.$url.$value["icono"].'" style="width:25%;"><p style="line-height:25px;">'.$value["categoria"].'</p>		

							</span>		


							</li>

							</a>';
						}


						?>
						
					</ul>

					<!--=====================================
					SUBCATEGORÍAS
					======================================-->

					<div class="d-none d-sm-block col-12 col-sm-6 col-lg-4 bg-light p-3 pl-4">
						
						<h5 class="text-gray-dark">Artículos <span class="tituloCategoria"><?php echo $categorias[0]["categoria"];  ?></span></h5>

						<hr>

						<ul class="list-unstyled listaSubcategorias">

							<?php

							$tabla = "subcategorias";
							$item = "id_categoria";
							$valor = 1;

							$subcategorias = ControladorCategorias::ctrMostrarCATySUB($tabla, $item, $valor);

							foreach ($subcategorias as $key => $value) {
								
								echo '<a href="'.$url.$value["ruta"].'" class="text-secondary">
								<li class="my-2">'.$value["subcategoria"].'</li>	
								</a>';
							}


							?>		

						</ul>

					</div>

					<!--=====================================
					DESCRIPCIÓN BREVE CATEGORIA
					======================================-->

					<div class="d-none d-lg-block col-lg-5 pt-3">
						
						<div class="card mr-lg-3">
							
							<img class="card-img-top imgCategoria" src="<?php echo $url.$categorias[0]["imgOferta"];  ?>">

							<div class="card-body">
								
								<h5 class="card-title text-gray-dark"><span class="tituloCategoria">Todo en <?php echo $categorias[0]["categoria"];  ?></span></h5>

								<p class="card-text small desCategoria"><?php echo $categorias[0]["descripcion"];  ?></p>

								<a href="<?php echo $url.$categorias[0]["ruta"]; ?>" class="btn backColor verProductos">Todos los Productos</a>

							</div>

						</div>

					</div>

				</div>
				
			</div>

		</div>

	</div>

</div>

</header>

<!--=================================================
=            VENTANA MODAL PARA REGISTRO            =
==================================================-->

<!-- The Modal -->
<div class="modal fade modalFormulario" id="modalRegistro" role="dialog">

	<div class="modal-dialog modal-content modal-lg">

		<!-- Modal Header -->
		<div class="modal-body modalTitulo">

			<h3 class="backColor">REGISTRARSE</h3>

			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<div class="row col-12 registroRedes">

				<!--=====================================
				INGRESO FACEBOOK
				======================================-->

				<div class="col-lg-6 col-sm-12 facebook">
					
					<p>
						<i class="fab fa-facebook"></i>
						Registro con Facebook
					</p>

				</div>

				<!--=====================================
				INGRESO GOOGLE
				======================================-->
				

				<div class="col-lg-6 col-sm-12 google">

					<a href="<?php echo $rutaGoogle; ?>">
						
						<p>
							<i class="fab fa-google"></i>
							Registro con Google
						</p>

					</a>

				</div>

			</div>

		<!--=====================================
		REGISTRO DIRECTO
		======================================-->

		<div class="row col-12 justify-content-center mt-2" style="margin-left: 0px;">

			<form method="post" onsubmit="return registroUsuario()">

				<hr>

				<div class="form-group">

					<div class="input-group">

						<span class="input-group-addon border p-2">

							<i class="fas fa-user"></i>

						</span>

						<input type="text" class="form-control text-uppercase" id="regUsuario" name="regUsuario" placeholder="Nombre Completo" required>

					</div>

				</div>

				<div class="form-group">

					<div class="input-group">

						<span class="input-group-addon border p-2">

							<i class="fas fa-envelope"></i>

						</span>

						<input type="email" class="form-control" id="regEmail" name="regEmail" placeholder="Correo Electrónico" required>

					</div>

				</div>

				<div class="form-group">

					<div class="input-group">

						<span class="input-group-addon border p-2">

							<i class="fas fa-lock"></i>

						</span>

						<input type="password" class="form-control" id="regPassword" name="regPassword" placeholder="Contraseña" required>

					</div>

				</div>

				<label class="text-muted"><small>*Te sugerimos: utilizar una contraseña segura con más de 8 caracteres, mayusculas y minusculas*</small></label>

				<!--=====================================
				https://www.iubenda.com/ CONDICIONES DE USO Y POLÍTICAS DE PRIVACIDAD
				======================================-->

				<div class="checkBox">
					
					<label>
						
						<input id="regPoliticas" type="checkbox">

						<small>

							Al registrarse, usted acepta nuestras condiciones de uso y políticas de privacidad

							<br>

							<a href="https://www.iubenda.com/privacy-policy/47939461" class="iubenda-black iubenda-embed" title="Privacy Policy ">Privacy Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>

						</small>

					</label>

				</div>

				<?php

				$registro = new ControladorUsuarios();
				$registro -> ctrRegistroUsuario();

				?>
				
				<input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">	

			</form>

		</div>

	</div>

	<!-- Modal footer -->
	<div class="modal-footer">

		¿Ya tienes una cuenta registrada? | <strong><a href="#modalIngreso" data-dismiss="modal" data-toggle="modal">Ingresar</a></strong>

	</div>

</div>

</div>

<!--====  End of VENTANA MODAL PARA REGISTRO  ====-->


<!--=================================================
=            VENTANA MODAL PARA INGRESO             =
==================================================-->

<!-- The Modal -->
<div class="modal fade modalFormulario" id="modalIngreso" role="dialog">

	<div class="modal-dialog modal-content modal-lg">

		<!-- Modal Header -->
		<div class="modal-body modalTitulo">

			<h3 class="backColor">INGRESAR</h3>

			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<div class="row col-12 ingresoRedes">

				<!--=====================================
				INGRESO FACEBOOK
				======================================-->

				<div class="col-lg-6 col-sm-12 facebook">
					
					<p>
						<i class="fab fa-facebook"></i>
						Ingreso con Facebook
					</p>

				</div>

				<!--=====================================
				INGRESO GOOGLE
				======================================-->
				

				<div class="col-lg-6 col-sm-12 google">

					<a href="<?php echo $rutaGoogle; ?>">
						
						<p>
							<i class="fab fa-google"></i>
							Ingreso con Google
						</p>

					</a>

				</div>

			</div>

		<!--=====================================
		INGRESO DIRECTO
		======================================-->

		<div class="row col-12 justify-content-center mt-2" style="margin-left: 0px;">

			<form method="post">

				<hr>
				

				<div class="form-group">

					<div class="input-group">

						<span class="input-group-addon border p-2">

							<i class="fas fa-envelope"></i>

						</span>

						<input type="email" class="form-control" id="ingEmail" name="ingEmail" placeholder="Correo Electrónico" required>

					</div>

				</div>

				<div class="form-group">

					<div class="input-group">

						<span class="input-group-addon border p-2">

							<i class="fas fa-lock"></i>

						</span>

						<input type="password" class="form-control" id="ingPassword" name="ingPassword" placeholder="Contraseña" required>

					</div>

				</div>

				<label class="text-white">Por favor, ingresa una contraseña segura con más de 8 caracteres</label>

				<?php

				$ingreso = new ControladorUsuarios();
				$ingreso -> ctrIngresoUsuario();

				?>
				
				<input type="submit" class="btn btn-default backColor btn-block btnIngreso" value="ENVIAR">

				<br>

				<center>

					<a href="#modalPassword" data-dismiss="modal" data-toggle="modal">¿Olvidaste tu contraseña?</a>

				</center>		

			</form>

		</div>

	</div>

	<!-- Modal footer -->
	<div class="modal-footer">

		¿Todavia no tienes una cuenta registrada? | <strong><a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registrase</a></strong>

	</div>

</div>

</div>

<!--====  End of VENTANA MODAL PARA INGRESO   ====-->


<!--=================================================
=      VENTANA MODAL PARA OLVIDO DE CONTRASEÑA      =
==================================================-->

<!-- The Modal -->
<div class="modal fade modalFormulario" id="modalPassword" role="dialog">

	<div class="modal-dialog modal-content modal-lg">

		<!-- Modal Header -->
		<div class="modal-body modalTitulo">

			<h3 class="backColor">SOLICITAR CONTRASEÑA</h3>

			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<div class="row col-12 ingresoRedes">

				<!--=====================================
				OLVIDO CONTRASEÑA
				======================================-->

				<div class="row col-12 justify-content-center mt-2">

					<form method="post">

						<label>Por favor, ingresa el correo electrónico con el que te registraste</label>

						<div class="form-group">

							<div class="input-group">

								<span class="input-group-addon border p-2">

									<i class="fas fa-envelope"></i>

								</span>
								
								<input type="email" class="form-control" id="passEmail" name="passEmail" placeholder="Correo Electrónico" required>

							</div>

						</div>

						<input type="submit" class="btn btn-default backColor btn-block btnIngreso" value="ENVIAR">

						<br>

						<?php

						$password = new ControladorUsuarios();
						$password -> ctrOlvidoPassword();

						?>

					</form>

				</div>

			</div>

			<!-- Modal footer -->
			<div class="modal-footer">

				¿Todavia no tienes una cuenta registrada? | <strong><a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registrase</a></strong>

			</div>

		</div>

	</div>

</div>

<!--==== End of VENTANA MODAL OLVIDO DE CONTRASEÑA ====-->

