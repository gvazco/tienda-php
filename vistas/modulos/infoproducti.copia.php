<?php

$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();

?>

<!--=====================================
BREADCRUMB INFOPRODUCTOS
======================================-->
<div class="container-fluid">
	
	<div class="container">
		
		<div class="row">
			
			<ul class=" col-12 col-xs-12 breadcrumb fondoBreadcrumb text-uppercase pl-5">
				
				<li><a href="<?php echo $url;  ?>">INICIO</a> /&nbsp;</li>
				<li class="active pagActiva"><?php echo $rutas[0] ?></li>

			</ul>

		</div>

	</div>

</div>

<!--=====================================
INFOPRODUCTOS
======================================-->
<div class="container-fluid infoproducto mt-3">
	
	<div class="container">
		
		<div class="row">

			<?php

			$item =  "ruta";
			$valor = $rutas[0];
			$infoproducto = ControladorProductos::ctrMostrarInfoProducto($item, $valor);

			$multimedia = json_decode($infoproducto["multimedia"],true);


				/*=============================================
				VISOR DE IMÁGENES
				=============================================*/

				if($infoproducto["tipo"] != "virtual"){

					echo '<div class="col-md-5 col-sm-6 col-xs-12 visorImg">

					<figure class="visor">';

					if($multimedia != null){

						for($i = 0; $i < count($multimedia); $i ++){

							echo '<img id="lupa'.($i+1).'" class="img-thumbnail" src="'.$servidor.$multimedia[$i]["foto"].'">';

						}								

						echo '</figure>

						<div class="flexslider">

						<ul class="slides">';

						for($i = 0; $i < count($multimedia); $i ++){

							echo '<li>
							<img value="'.($i+1).'" class="img-thumbnail" src="'.$servidor.$multimedia[$i]["foto"].'" alt="'.$infoproducto["titulo"].'">
							</li>';

						}

					}		

					echo '</ul>

					</div>

					</div>';			

				}else{

					/*=============================================
					VISOR DE VIDEO
					=============================================*/

					echo '<div class="col-sm-6 col-xs-12">

					<iframe class="videoPresentacion" src="https://www.youtube.com/embed/'.$infoproducto["multimedia"].'?rel=0&autoplay=0" width="100%" frameborder="0" allowfullscreen></iframe>

					</div>';

				}			

				?>

			<!--=====================================
			PRODUCTO
			======================================-->

			<?php

			if($infoproducto["tipo"] != "virtual"){

				echo '<div class="col-md-7 col-sm-6 col-xs-12">';

			}else{

				echo '<div class="col-sm-6 col-xs-12">';
			}

			?>

				<!--=====================================
				REGRESAR A LA TIENDA
				======================================-->

				<div class="row col-12 justify-content-between">

					<div class="col-xs-6">

						<h6>

							<a href="javascript:history.back()" class="text-muted">

								<i class="fa fa-reply"></i> Continuar Comprando

							</a>

						</h6>

					</div>

				<!--=====================================
				COMPARTIR EN REDES SOCIALES
				======================================-->

				<div class="col-xs-6">
					
					<h6>
						
						<a class="dropdown-toggle pull-right text-muted" data-toggle="dropdown" href="">
							
							<i class="fa fa-plus"></i> Compartir

						</a>

						<ul class="dropdown-menu pull-right compartirRedes">

							<li>
								<p class="btnFacebook">
									<i class="fab fa-facebook"></i>
									Facebook
								</p>
							</li>

							<li>
								<p class="btnGoogle">
									<i class="fab fa-google"></i>
									Google
								</p>
							</li>
							
						</ul>

					</h6>

				</div>

			</div>

				<!--=====================================
				ESPACIO PARA EL PRODUCTO
				======================================-->

				<?php

				echo '<div class="comprarAhora" style="display:none">


				<button class="btn btn-default backColor quitarItemCarrito" idProducto="'.$infoproducto["id"].'" peso="'.$infoproducto["peso"].'"></button>

				<p class="tituloCarritoCompra text-left">'.$infoproducto["titulo"].'</p>';


				if($infoproducto["oferta"] == 0){

					echo'<input class="cantidadItem" value="1" tipo="'.$infoproducto["tipo"].'" precio="'.$infoproducto["precio"].'" idProducto="'.$infoproducto["id"].'">

					<p class="subTotal'.$infoproducto["id"].' subtotales">

					<strong>MXN $<span>'.$infoproducto["precio"].'</span></strong>

					</p>

					<div class="sumaSubTotal"><span>'.$infoproducto["precio"].'</span></div>';


				}else{

					echo'<input class="cantidadItem" value="1" tipo="'.$infoproducto["tipo"].'" precio="'.$infoproducto["precioOferta"].'" idProducto="'.$infoproducto["id"].'">

					<p class="subTotal'.$infoproducto["id"].' subtotales">

					<strong>MXN $<span>'.$infoproducto["precioOferta"].'</span></strong>

					</p>

					<div class="sumaSubTotal"><span>'.$infoproducto["precioOferta"].'</span></div>';


				}


				echo '</div>';

					/*=============================================
					TITULO
					=============================================*/				
					
					if($infoproducto["oferta"] == 0){

						$fecha = date('Y-m-d');
						$fechaActual = strtotime('-30 day', strtotime($fecha));
						$fechaNueva = date('Y-m-d', $fechaActual);

						if($fechaNueva > $infoproducto["fecha"]){

							echo '<h1 class="text-muted text-uppercase mt-3 info-p">'.$infoproducto["titulo"].'</h1>';

						}else{

							echo '<h1 class="text-muted text-uppercase mt-3 info-p">'.$infoproducto["titulo"].'

							<br>

							<small>

							<span class="btn btn-warning btn-xs mt-2 backColor fontSize">Nuevo</span>

							</small>

							</h1>';

						}

					}else{

						$fecha = date('Y-m-d');
						$fechaActual = strtotime('-30 day', strtotime($fecha));
						$fechaNueva = date('Y-m-d', $fechaActual);

						if($fechaNueva > $infoproducto["fecha"]){

							echo '<h1 class="text-muted text-uppercase mt-3 info-p">'.$infoproducto["titulo"].'

							<br>';

							if($infoproducto["precio"] != 0){

								echo '<small>

								<span class="btn btn-warning btn-xs mt-2 backColor fontSize">'.$infoproducto["descuentoOferta"].'% off</span>

								</small>';

							}
							
							echo '</h1>';

						}else{

							echo '<h1 class="text-muted text-uppercase mt-3 info-p">'.$infoproducto["titulo"].'

							<br>';

							if($infoproducto["precio"] != 0){

								echo '<small>
								<span class="btn btn-warning btn-xs mt-2 backColor fontSize ">Nuevo</span> 
								<span class="btn btn-warning btn-xs mt-2 backColor fontSize">'.$infoproducto["descuentoOferta"].'% off</span> 

								</small>';

							}
							
							echo '</h1>';

						}
					}

					/*=============================================
					PRECIO
					=============================================*/	

					
					if($infoproducto["tipo"] == "cotizar"){

						echo '<h2><small>SOLICITAR COTIZACIÓN</small></h2>';

					}else if($infoproducto["precio"] == 0){

						echo '<h2 class="text-muted">GRATIS</h2>';

					}else{

						if($infoproducto["oferta"] == 0){

							echo '<h2 class="text-muted">MXN $'.$infoproducto["precio"].'</h2>';

						}else{

							echo '<h2 class="text-muted">

							<span>

							<strong class="oferta">MXN $'.$infoproducto["precio"].'</strong>

							</span>

							<span>

							$'.$infoproducto["precioOferta"].'

							</span>

							</h2>';

						}

					}

					/*=============================================
					DESCRIPCIÓN
					=============================================*/		

					echo '<p style="font-size:18px; text-align:justify">'.$infoproducto["descripcion"].'</p>';

					?>

				<!--=====================================
				CARACTERÍSTICAS DEL PRODUCTO
				======================================-->

				<hr>

				<div class="form-group row">
					
					<?php

					if($infoproducto["detalles"] != null){

						$detalles = json_decode($infoproducto["detalles"], true);

						if($infoproducto["tipo"] == "fisico"){

							if($detalles["Talla"]!=null){

								echo '<div class="col-md-3 col-xs-12">

								<select class="form-control seleccionarDetalle" id="seleccionarTalla">

								<option value="">Talla</option>';

								for($i = 0; $i <= count($detalles["Talla"]); $i++){

									echo '<option value="'.$detalles["Talla"][$i].'">'.$detalles["Talla"][$i].'</option>';

								}

								echo '</select>

								</div>';

							}

							if($detalles["Color"]!=null){

								echo '<div class="col-md-3 col-xs-12">

								<select class="form-control seleccionarDetalle" id="seleccionarColor">

								<option value="">Color</option>';

								for($i = 0; $i <= count($detalles["Color"]); $i++){

									echo '<option value="'.$detalles["Color"][$i].'">'.$detalles["Color"][$i].'</option>';

								}

								echo '</select>

								</div>';

							}

							if($detalles["Marca"]!=null){

								echo '<div class="col-md-3 col-xs-12">

								<select class="form-control seleccionarDetalle" id="seleccionarMarca">

								<option value="">Marca</option>';

								for($i = 0; $i <= count($detalles["Marca"]); $i++){

									echo '<option value="'.$detalles["Marca"][$i].'">'.$detalles["Marca"][$i].'</option>';

								}

								echo '</select>

								</div>';

							}

						}else{

							if($infoproducto["tipo"] == "cotizar"){

								echo '<div class="col-xs-12 pl-3">

								<li> 
								<i style="margin-right:10px; font-size:small;" class="fa fa-industry"></i> '.$detalles["Ficha"].'
								</li>
								<li>
								<i style="margin-right:10px; font-size:small;" class="fa fa-arrows-alt"></i> '.$detalles["Largos"].'
								</li>
								<li>
								<i style="margin-right:10px; font-size:small;" class="fa fa-expand"></i> '.$detalles["Calibre"].'
								</li>
								<li>
								<i style="margin-right:10px; font-size:small;" class="fa fa-truck"></i> '.$detalles["Envio"].'
								</li>
								<li>
								<i style="margin-right:10px; font-size:small;" class="fa fa-exclamation-circle"></i>'.$detalles["Info"].' 
								</li>

								</div>';

							}else{

								if($infoproducto["tipo"] == "descarga"){

									echo '<div class="col-xs-12 pl-3">

									<li> 
									<i style="margin-right:10px; font-size:small;" class="fa fa-industry"></i> '.$detalles["Formato"].'
									</li>
									<li>
									<i style="margin-right:10px; font-size:small;" class="fa fa-arrows-alt"></i> '.$detalles["Paginas"].'
									</li>
									<li>
									<i style="margin-right:10px; font-size:small;" class="fa fa-exclamation-circle"></i>'.$detalles["Info"].' 
									</li>

									</div>';


								}else{

									echo '<div class="col-xs-12 pl-3">

									<li>
									<i style="margin-right:10px; font-size:small;" class="fa fa-play-circle"></i> '.$detalles["Clases"].'
									</li>
									<li>
									<i style="margin-right:10px; font-size:small;" class="far fa-clock"></i> '.$detalles["Tiempo"].'
									</li>
									<li>
									<i style="margin-right:10px; font-size:small;" class="fa fa-check-circle"></i> '.$detalles["Nivel"].'
									</li>
									<li>
									<i style="margin-right:10px; font-size:small;" class="fa fa-info-circle"></i> '.$detalles["Acceso"].'
									</li>
									<li>
									<i style="margin-right:10px; font-size:small;" class="fa fa-desktop"></i> '.$detalles["Dispositivo"].'
									</li>
									<li>
									<i style="margin-right:10px; font-size:small;" class="fa fa-trophy"></i> '.$detalles["Certificado"].'
									</li>

									</div>';

								}

							}

						}

					}


					/*=============================================
					ENTREGA
					=============================================*/

					if($infoproducto["entrega"] == 0){

						if($infoproducto["precio"] == 0){

							echo '<h4 class="col-md-12 col-sm-0 col-xs-0">

							<hr>

							<span class="btn btn-block btn-secondary disabled" style="font-weight:100; font-size:small; cursor:auto;s">

							<i class="far fa-clock" style="margin-right:5px"></i>
							Entrega inmediata | 
							<i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
							'.$infoproducto["ventasGratis"].' inscritos |
							<i class="fa fa-eye" style="margin:0px 5px"></i>
							Visto por <span class="vistas" tipo="'.$infoproducto["precio"].'">'.$infoproducto["vistasGratis"].'</span> personas

							</span>

							</h4>

							<h4 class="col-lg-0 col-md-0 col-xs-12">

							<hr>

							<small>

							<i class="far fa-clock" style="margin-right:5px"></i>
							Entrega inmediata <br>
							<i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
							'.$infoproducto["ventasGratis"].' inscritos <br>
							<i class="fa fa-eye" style="margin:0px 5px"></i>
							Visto por <span class="vistas" tipo="'.$infoproducto["precio"].'">'.$infoproducto["vistasGratis"].'</span> personas

							</small>

							</h4>';

						}else{

							echo '<h4 class="col-md-12 col-sm-0 col-xs-0">

							<hr>

							<span class="btn btn-block btn-secondary disabled" style="font-weight:100; font-size:small; cursor:auto;s">

							<i class="far fa-clock" style="margin-right:5px"></i>
							Entrega inmediata |
							<i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
							'.$infoproducto["ventas"].' ventas |
							<i class="fa fa-eye" style="margin:0px 5px"></i>
							Visto por <span class="vistas" tipo="'.$infoproducto["precio"].'">'.$infoproducto["vistas"].' </span> personas

							</span>

							</h4>';

						}

					}else{

						if($infoproducto["precio"] == 0){

							echo '<h4 class="col-md-12 col-sm-0 col-xs-0">

							<hr>

							<span class="btn btn-block btn-secondary disabled" style="font-weight:100; font-size:small;  cursor:auto;s">

							<i class="far fa-clock" style="margin-right:5px"></i>Entrega en
							'.$infoproducto["entrega"].' días hábiles |
							<i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
							'.$infoproducto["ventasGratis"].' solicitudes  |
							<i class="fa fa-eye" style="margin:0px 5px"></i>
							Visto por <span class="vistas" tipo="'.$infoproducto["precio"].'">'.$infoproducto["vistasGratis"].'</span> personas  

							</span>

							</h4>';

						}else{

							echo '<h4 class="col-md-12 col-sm-0 col-xs-0">

							<hr>

							<span class="btn btn-block btn-secondary disabled" style="font-weight:100; font-size:small; cursor:auto;s">

							<i class="far fa-clock" style="margin-right:5px"></i>Entrega en
							'.$infoproducto["entrega"].' días hábiles |
							<i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
							'.$infoproducto["ventas"].' ventas |
							<i class="fa fa-eye" style="margin:0px 5px"></i>
							Visto por <span class="vistas" tipo="'.$infoproducto["precio"].'">'.$infoproducto["vistas"].' </span> personas

							</span>

							</h4>';

						}

					}				

					?>

				</div>

				<!--=====================================
				BOTONES DE COMPRA
				======================================-->

				<div class="row botonesCompra">

					<?php

					if($infoproducto["precio"]==0){

						echo '<div class="col-12 col-xs-12">';

						if(isset($_SESSION["validarSesion"]) && $_SESSION["validarSesion"] == "ok"){

							if($infoproducto["tipo"]=="virtual"){

								echo '<a href="'.$infoproducto["rutaAfiliado"].'"><button class="btn btn-success btn-block backColor agregarGratis" idProducto="'.$infoproducto["id"].'" idUsuario="'.$_SESSION["id"].'" tipo="'.$infoproducto["tipo"].'" titulo="'.$infoproducto["titulo"].'">ACCEDER AHORA</button>
								</a>';

							}else{

								echo '<a href="'.$infoproducto["rutaAfiliado"].'"><button class="btn btn-success btn-block backColor agregarGratis" idProducto="'.$infoproducto["id"].'" idUsuario="'.$_SESSION["id"].'" tipo="'.$infoproducto["tipo"].'" titulo="'.$infoproducto["titulo"].'">SOLICITAR AHORA</button></a>

								<br>

								<div class="col-xs-12 panel panel-info text-left">

								<strong>¡Atención!</strong>

								El producto a solicitar es totalmente gratuito.

								</div>
								';

							}

						}else{

							echo '<a href="#modalIngreso" data-toggle="modal">

							<button class="btn btn-success btn-block backColor">	SOLICITAR AHORA</button>

							</a>';

						}

						echo '</div>';

					}else{

						if($infoproducto["tipo"]=="cotizar"){

							echo '<div class="col-12 col-xs-12">

							<a class="cotizarProducto" href="#modalCotizar" data-toggle="modal" idCotizar="">

							<button class="btn btn-success btn-block backColor pull-left cotizar">SOLICITAR COTIZACIÓN <i class="fa fa-comments"></i></button>

							</a>

							</div';

						}else if($infoproducto["tipo"]=="virtual"){

							echo '<div class="col-12 col-xs-12">';

							if(isset($_SESSION["validarSesion"])){

								if($_SESSION["validarSesion"] == "ok"){

									echo '<a href="'.$infoproducto["rutaAfiliado"].'"><button class="btn btn-success btn-block backColor">
									<small>ADQUIRIR AHORA</small></button></a>';

								}

							}else{

								echo '<a href="'.$infoproducto["rutaAfiliado"].'"><button class="btn btn-success btn-block backColor">
								<small>ADQUIRIR AHORA</small></button></a>';

							}

						}else{

							echo '<div class="col-12 col-xs-12">';

							if($infoproducto["oferta"] != 0){

								echo '<button class="btn btn-success btn-block backColor agregarCarrito"  idProducto="'.$infoproducto["id"].'" imagen="'.$servidor.$infoproducto["portada"].'" titulo="'.$infoproducto["titulo"].'" precio="'.$infoproducto["precioOferta"].'" tipo="'.$infoproducto["tipo"].'" peso="'.$infoproducto["peso"].'">';

							}else{

								echo '<button class="btbtn btn-success btn-block backColor agregarCarrito"  idProducto="'.$infoproducto["id"].'" imagen="'.$servidor.$infoproducto["portada"].'" titulo="'.$infoproducto["titulo"].'" precio="'.$infoproducto["precio"].'" tipo="'.$infoproducto["tipo"].'" peso="'.$infoproducto["peso"].'">';

							}


							echo 'ADICIONAR AL CARRITO 

							<i class="fa fa-shopping-cart"></i>

							</button>

							</div>';

						}

					}

					?>

				</div>
				
				<!--=====================================
				ZONA DE LUPA
				======================================-->

				<figure class="lupa">
					
					<img src="">

				</figure>

			</div>
			
		</div>

	</div>

<!--=====================================
ARTÏCULOS RELACIONADOS
======================================-->
<div class="container-fluid productos mt-5">
	
	<div class="container">

		<div class="row">

			<div class="col-12 col-xs-12" style="display: inline-flex;">

				<div class="col-sm-6 col-xs-12 text-left">

					<h3><small>PRODUCTOS RELACIONADOS</small></h3>

				</div>

				<div class="col-sm-6 col-xs-12 text-right">

					<?php

					$item = "id";
					$valor = $infoproducto["id_subcategoria"];

					$rutaArticulosDestacados = ControladorProductos::ctrMostrarSubcategorias($item, $valor);

					echo '<a href="'.$url.$rutaArticulosDestacados[0]["ruta"].'">

					<button class="btn btn-default backColor pull-right">

					VER MÁS <span class="fa fa-chevron-right"></span>

					</button>

					</a>';

					?>

				</div>

			</div>

			<hr>

		</div>

		<?php

		$ordenar = "";
		$item = "id_subcategoria";
		$valor = $infoproducto["id_subcategoria"];
		$base = 0;
		$tope = 4;
		$modo = "Rand()";

		$relacionados = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);

		if(!$relacionados){

			echo '<div class="col-xs-12 error404">

			<h1><small>¡Oops!</small></h1>

			<h2>No hay productos relacionados</h2>

			</div>';

		}else{

			echo '<ul class="grid0" style="display:inline-flex">';

			foreach ($relacionados as $key => $value) {

				if($value["estado"] != 0){

					echo '<li class="card col-12 col-lg-3 col-md-6 border-0 mt-2 mb-4 mb-lg-0 p-3"  style="background:#eee">

					<figure>

					<a href="'.$url.$value["ruta"].'" class="pixelProducto">

					<img src="'.$servidor.$value["portada"].'" class="img-responsive" width="100%">

					</a>

					</figure>

					<div class="card-body border shadow-sm p-4 p-lg-3 p-xl-2 bg-white">

					<h6 class="card-title" style="text-align:center;">

					<a href="'.$url.$value["ruta"].'" target="_blank" class="pixelProducto">

					<strong>'.$value["titulo"].'</strong>

					<br>

					<span style="color:rgba(0,0,0,0)">-</span>';

					$fecha = date('Y-m-d');
					$fechaActual = strtotime('-30 day', strtotime($fecha));
					$fechaNueva = date('Y-m-d', $fechaActual);

					if($fechaNueva < $value["fecha"]){

						echo '<span class="btn btn-warning btn-xs mt-2 backColor fontSize">Nuevo</span> ';

					}

					if($value["oferta"] != 0 && $value["precio"] != 0){

						echo '<span class="btn btn-warning btn-xs mt-2 backColor fontSize">'.$value["descuentoOferta"].'% off</span>';

					}

					echo '</a>			

					</h6>

					<div class="col-xs-6 mt-1 precio">';

					if($value["precio"] == 0){

						echo '<h2><small>GRATIS</small></h2>';

					}else if($value["precio"] == 1){

						echo '<h2><small>COTIZAR</small></h2>';				
					}else{

						if($value["oferta"] != 0){

							echo '<h2>

							<small>

							<strong class="oferta">MXN $'.$value["precio"].'</strong>

							</small>

							<small>$'.$value["precioOferta"].'</small>

							</h2>';

						}else{

							echo '<h2><small>MXN $'.$value["precio"].'</small></h2>';

						}

					}

					echo '</div>

					<div class="col-xs-6 pt-0 enlaces">

					<div class="btn-group pull-right">

					<button type="button" class="btn btn-default btn-xs deseos border" idProducto="'.$value["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos">

					<i class="fa fa-heart" aria-hidden="true"></i>

					</button>';

					if($value["tipo"] == "virtual" && $value["precio"] != 0){

						if($value["oferta"] != 0){

							echo '<a href="'.$value["rutaAfiliado"].'"><button type="button" class="btn btn-default btn-xs agregarCar border"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precioOferta"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Adquirir Ahora">

							<i class="fa fa-shopping-cart" aria-hidden="true"></i>

							</button> </a>';

						}else{

							echo '<a href="'.$value["rutaAfiliado"].'"><button type="button" class="btn btn-default btn-xs agregarCar border"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Adquirir Ahora">

							<i class="fa fa-shopping-cart" aria-hidden="true"></i>

							</button> </a>';

						}

					}

					if($value["tipo"] == "cotizar" && $value["precio"] != 0){

						if($value["oferta"] != 0){

							echo '

							<button type="button" class="btn btn-default btn-xs solicitarCotizacion border ver" data-toggle="modal" title="Cotizar Ahora" data-target="#modalCotizar">

							<i class="fas fa-clipboard-list" aria-hidden="true"></i>

							</button>';

						}else{

							echo '<button type="button" class="btn btn-default btn-xs solicitarCotizacion border ver"  data-toggle="modal" title="Cotizar Ahora" data-target="#modalCotizar">

							<i class="fas fa-clipboard-list" aria-hidden="true"></i>

							</button> </a>';

						}

					}

					echo '<a href="'.$value["ruta"].'" class="pixelProducto">

					<button type="button" class="btn btn-default btn-xs border ver" data-toggle="tooltip" title="Ver producto">

					<i class="fa fa-eye" aria-hidden="true"></i>

					</button>	

					</a>

					</div>

					</div>



					</li>';

				}

			}

			echo '</ul>';

		}

		?>

	</div>

</div>

<!--=====================================
VENTANA MODAL PARA COTIZAR
======================================-->

<div class="modal" id="modalCotizar">

	<div class="modal-dialog modal-lg">

		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>

			<!-- Modal body -->
			<div class="modal-body modalTitulo m-3">

				<form method="post" onsubmit="">

					<center>
						<h4 class="modal-title p-2 backColor">COTICE SUS PRODUCTOS</h4>
					</center>

					<input type="hidden" value="" id="idCotizar" name="idCotizar">

					<h5 class="text-center text-muted mt-2"><small>DEBIDO A OSCILACIONES EN EL TIPO DE CAMBIO ($MXN-$MXN), DEBEMOS COTIZAR SUS PRODUCTOS</small></h5>

					<h6 class="text-center text-muted"><small>PARA SU MEJOR ATENCIÓN, FAVOR DE LLENAR LOS SIGUIENTES CAMPOS:</small></h6>

					<br>

					<div class="container col-xs-12">

						<div class="input-group">
							<span class="input-group-addon border p-1 pl-2 pr-2"><i class="fas fa-user"></i></span>
							<input id="nombreCotizar" type="text" class="form-control" name="nombreCotizar" placeholder="Escriba su Nombre:" value="">
						</div>

						<br>

						<div class="input-group">
							<span class="input-group-addon border p-1 pl-2 pr-2"><i class="far fa-envelope"></i></span>
							<input id="emailCotizar" type="email" class="form-control" name="emailCotizar" placeholder="Escriba su Correo Electrónico:" value="">
						</div>

						<br>

						<div class="input-group">
							<span class="input-group-addon border p-1 pl-2 pr-2"><i class="fas fa-mobile"></i></span>
							<input id="telefonoCotizar" type="tetx" class="form-control" name="telefonoCotizar" placeholder="Ingrese su número de contacto*" value="">
						</div>

						<span class="text-info"><small>*Si usted no desea ingresar su número, le enviaremos un e-mail</small></span>

						<br>
						<br>

						<div class="input-group">
							<span class="input-group-addon border p-1 pl-2 pr-2"><i class="fas fa-box-open"></i></span>
							<input id="piezasCotizar" type="text" class="form-control" name="piezasCotizar" placeholder="¿Qué Producto?" value="">
						</div>

						<br>

						<div class="input-group">
							<span class="input-group-addon border p-1 pl-2 pr-2"><i class="fas fa-list-ol"></i></span></span>
							<input id="piezasCotizar" type="text" class="form-control" name="piezasCotizar" placeholder="¿Cuántas piezas necesita? ¿Largo? ¿Calibre?*" value="">
						</div>

						<span class="text-info"><small>*Si usted no lo sabe con certeza, especifique en el campo dudas.</small></span>

						<br>

						<br>

						<div class="input-group">
							<span class="input-group-addon border p-1 pl-2 pr-2"><i class="fas fa-truck-moving"></i></span>
							<input id="direccionCotizar" type="text" class="form-control" name="direccionCotizar" placeholder="Dirección (Estado, Municipio, Calle, #, C.P.) de envío" value="">
						</div>

						<br>

						<div class="form-group">
							<label for="comment" class="text-muted">¿Tiene dudas o comentarios acerca de su material?: 
								<br>
								<span class="text-info"><small>Campo Obligatorio, máximo 600 caracteres.</small></span></label>

								<textarea class="form-control" name="dudasCotizar" id="dudasCotizar" rows="5" maxlength="600" value="" required></textarea>
							</div>

							<h5 class="text-center text-muted"><small>EN <b>MEVASA</b> NOS ESFORZAMOS POR BRINDARLE SERVICIO Y CALIDAD ¡AL MEJOR PRECIO!</small></h5>

							<input type="submit" class="btn btn-default backColor btn-block botonCotizar" value="SOLICITAR COTIZACIÓN" id="solicitarCotizacion">

						</div>

						<!-- Modal footer -->
						<div class="modal-footer mt-3">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">¡Cerrar!
							</button>
						</div>

				</form>

			</div>

		</div>

	</div>

</div>


<!--=====================================
VENTANA MODAL PARA CHECKOUT
======================================-->

<div id="modalComprarAhora" class="modal fade modalFormulario" role="dialog">
	
	<div class="modal-content modal-dialog">

		<div class="modal-body modalTitulo">
			
			<h3 class="backColor">REALIZAR PAGO</h3>

			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<div class="contenidoCheckout">

				<?php

				$respuesta = ControladorCarrito::ctrMostrarTarifas();

				echo '<input type="hidden" id="tasaImpuesto" value="'.$respuesta["impuesto"].'">
				<input type="hidden" id="envioNacional" value="'.$respuesta["envioNacional"].'">
				<input type="hidden" id="envioInternacional" value="'.$respuesta["envioInternacional"].'">
				<input type="hidden" id="tasaMinimaNal" value="'.$respuesta["tasaMinimaNal"].'">
				<input type="hidden" id="tasaMinimaInt" value="'.$respuesta["tasaMinimaInt"].'">
				<input type="hidden" id="tasaPais" value="'.$respuesta["pais"].'">

				';

				?>
				
				<div class="formEnvio row">
					
					<h4 class="text-center well text-muted text-uppercase">Información de envío</h4>

					<div class="col-xs-12 seleccionePais">
						
						

					</div>

				</div>

				<br>

				<div class="formaPago row">
					
					<h4 class="text-center well text-muted text-uppercase">Elige la forma de pago</h4>

					<figure class="col-xs-6">
						
						<center>
							
							<input id="checkPaypal" type="radio" name="pago" value="paypal" checked>

						</center>	
						
						<img src="<?php echo $url; ?>vistas/img/plantilla/paypal.jpg" class="img-thumbnail">		

					</figure>

					<figure class="col-xs-6">
						
						<center>
							
							<input id="checkPayu" type="radio" name="pago" value="payu">

						</center>

						<img src="<?php echo $url; ?>vistas/img/plantilla/payu.jpg" class="img-thumbnail">

					</figure>

				</div>

				<br>

				<div class="listaProductos row">
					
					<h4 class="text-center well text-muted text-uppercase">Productos a comprar</h4>

					<table class="table table-striped tablaProductos">
						
						<thead>

							<tr>		
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Precio</th>
							</tr>

						</thead>

						<tbody>



						</tbody>

					</table>

					<div class="col-sm-6 col-xs-12 pull-right">
						
						<table class="table table-striped tablaTasas">
							
							<tbody>
								
								<tr>
									<td>Subtotal</td>	
									<td><span class="cambioDivisa">MXN</span> $<span class="valorSubtotal" valor="0">0</span></td>	
								</tr>

								<tr>
									<td>Envío</td>	
									<td><span class="cambioDivisa">MXN</span> $<span class="valorTotalEnvio" valor="0">0</span></td>	
								</tr>

								<tr>
									<td>Impuesto</td>	
									<td><span class="cambioDivisa">MXN</span> $<span class="valorTotalImpuesto" valor="0">0</span></td>	
								</tr>

								<tr>
									<td><strong>Total</strong></td>	
									<td><strong><span class="cambioDivisa">MXN</span> $<span class="valorTotalCompra" valor="0">0</span></strong></td>	
								</tr>

							</tbody>	

						</table>

						<div class="divisa">

							<select class="form-control" id="cambiarDivisa" name="divisa">



							</select>	

							<br>

						</div>

					</div>

					<div class="clearfix"></div>

					<form class="formPayu" style="display:none">

						<input name="merchantId" type="hidden" value=""/>
						<input name="accountId" type="hidden" value=""/>
						<input name="description" type="hidden" value=""/>
						<input name="referenceCode" type="hidden" value=""/>	
						<input name="amount" type="hidden" value=""/>
						<input name="tax" type="hidden" value=""/>
						<input name="taxReturnBase" type="hidden" value=""/>
						<input name="shipmentValue" type="hidden" value=""/>
						<input name="currency" type="hidden" value=""/>
						<input name="lng" type="hidden" value="es"/>
						<input name="confirmationUrl" type="hidden" value="" />
						<input name="responseUrl" type="hidden" value=""/>
						<input name="declinedResponseUrl" type="hidden" value=""/>
						<input name="displayShippingInformation" type="hidden" value=""/>
						<input name="test" type="hidden" value="" />
						<input name="signature" type="hidden" value=""/>

						<input name="Submit" class="btn btn-block btn-md btn-default backColor" type="submit"  value="PAGAR" >
					</form>
					
					<button class="btn btn-block btn-md btn-default backColor btnPagar">PAGAR</button>

				</div>

			</div>

		</div>

	</div>

</div>


<?php

if($infoproducto["tipo"] != "virtual"){

	echo '<script type="application/ld+json">

	{
		"@context": "http://schema.org/",
		"@type": "Product",
		"name": "'.$infoproducto["titulo"].'",
		"image": [';

		for($i = 0; $i < count($multimedia); $i ++){

			echo $servidor.$multimedia[$i]["foto"].',';

		}

		echo '],
		"description": "'.$infoproducto["descripcion"].'"

	}

	</script>';

}else{

	echo '<script type="application/ld+json">

	{
		"@context": "http://schema.org",
		"@type": "Course",
		"name": "'.$infoproducto["titulo"].'",
		"description": "'.$infoproducto["descripcion"].'",
		"provider": {
			"@type": "Organization",
			"name": "Tu Logo",
			"sameAs": "'.$url.$infoproducto["ruta"].'"
		}
	}

	</script>';

}

?>




