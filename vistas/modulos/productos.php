<?php

$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();

$ruta = $rutas[0];

$banner = ControladorProductos::ctrMostrarBanner($ruta);

date_default_timezone_set('America/Mexico_City');

$fecha = date('Y-m-d');
$hora = date('H:i:s');

$fechaActual = $fecha.' '.$hora;

if($banner != null){ 

	if($banner["estado"] != 0){

		echo '<figure class="banner">

		<img src="'.$servidor.$banner["img"].'" class="img-responsive" width="100%">';	

		if($banner["ruta"] != "sin-categoria"){

					/*=============================================
					BANNER PARA CATEGORÍAS
					=============================================*/

					if($banner["tipo"] == "categorias"){

						$item = "ruta";
						$valor = $banner["ruta"];

						$ofertas = ControladorProductos::ctrMostrarCategorias($item, $valor);

						if($ofertas["oferta"] == 1){

							echo '<div class="textoBanner textoIzq bannerPrincipal bannerSecundario">

							<h1 style="color:#fff" class="text-uppercase">Artículos de '.$ofertas["categoria"].'</h1>

							</div>

							<div class="textoBanner textoDer">
							
							<h1 style="color:#fff">OFERTAS ESPECIALES</h1>
							';

							if($ofertas["precioOferta"] != 0){

								echo '<h2 style="color:#fff"><strong>Productos desde $ '.$ofertas["precioOferta"].'</strong></h2>';

							}

							if($ofertas["descuentoOferta"] != 0){
								
								echo '<h2 style="color:#fff"><strong>Productos con '.$ofertas["descuentoOferta"].'% OFF</strong></h2>';
							}

							echo '<h3 class="col-md-0 col-sm-0 col-xs-0" style="color:#fff">


							<div class="countdown2" finOferta="'.$ofertas["finOferta"].'">


							</h3>';

							$datetime1 = new DateTime($ofertas["finOferta"]);
							$datetime2 = new DateTime($fechaActual);

							$interval = date_diff($datetime1, $datetime2);

							$finOferta = $interval->format('%a');

							if($finOferta == 0){

								echo '<h3 class="col-lg-0" style="color:#fff">La oferta termina hoy</h3>';

							}else if($finOferta == 1){

								echo '<h3 class="col-lg-0" style="color:#fff">La oferta termina en '.$finOferta.' día</h3>';

							}else{

								echo '<h3 class="col-lg-0" style="color:#fff">La oferta termina en '.$finOferta.' días</h3>';

							}


							echo '</div>';

						}else{

							echo '<div class="textoBanner textoIzq bannerPrincipal bannerSecundario">

							<h1 style="color:#fff" class="text-uppercase">Artículos de '.$ofertas["categoria"].'</h1>

							</div>';

						}

					}

					/*=============================================
					BANNER PARA SUBCATEGORÍAS
					=============================================*/

					if($banner["tipo"] == "subcategorias"){

						$item = "ruta";
						$valor = $banner["ruta"];

						$ofertas = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

						if($ofertas[0]["oferta"] == 1){

							echo '<div class="textoBanner textoIzq">

							<h1 style="color:#fff" class="text-uppercase bannerSecundario">Artículos de '.$ofertas[0]["subcategoria"].'</h1>

							</div>

							<div class="textoBanner textoDer">
							
							<h1 style="color:#fff">OFERTAS ESPECIALES</h1>
							';

							if($ofertas[0]["precioOferta"] != 0){

								echo '<h2 style="color:#fff"><strong>Productos desde $ '.$ofertas[0]["precioOferta"].'</strong></h2>';

							}

							if($ofertas[0]["descuentoOferta"] != 0){
								
								echo '<h2 style="color:#fff"><strong>Productos con '.$ofertas[0]["descuentoOferta"].'% OFF</strong></h2>';
							}

							echo '<h3 class="col-md-0 col-sm-0 col-xs-0" style="color:#fff">


							<div class="countdown2" finOferta="'.$ofertas[0]["finOferta"].'">


							</h3>';

							$datetime1 = new DateTime($ofertas[0]["finOferta"]);
							$datetime2 = new DateTime($fechaActual);

							$interval = date_diff($datetime1, $datetime2);

							$finOferta = $interval->format('%a');

							if($finOferta == 0){

								echo '<h3 class="col-lg-0" style="color:#fff">La oferta termina hoy</h3>';

							}else if($finOferta == 1){

								echo '<h3 class="col-lg-0" style="color:#fff">La oferta termina en '.$finOferta.' día</h3>';

							}else{

								echo '<h3 class="col-lg-0" style="color:#fff">La oferta termina en '.$finOferta.' días</h3>';

							}


							echo '</div>';

						}else{

							echo '<div class="textoBanner textoIzq">

							<h1 style="color:#fff" class="text-uppercase bannerSecundario ">Artículos de '.$ofertas[0]["subcategoria"].'</h1>

							</div>';

						}

					}

				}

				echo '</figure>';

			}

		}

		?>

<!--=====================================
BARRA PRODUCTOS
======================================-->
<div class="container-fluid migas">
	
	<divc class="container">
		
		<div class="row">

			<!--=====================================
			BREADCRUMB O MIGAS DE PAN
			======================================-->

			<ul class=" col-12 col-xs-12 breadcrumb fondoBreadcrumb text-uppercase pl-5">
				
				<li><a href="<?php echo $url;  ?>">INICIO</a> /&nbsp;</li>
				<li class="active pagActiva"><?php echo $rutas[0] ?></li>

			</ul>

		</div>

	</div>

</div>

<div class="container-fluid well well-sm barraProductos">

	<div class="container">

		<div class="row">
			
			<div class="col-md-6 col-sm-12">
				
				<div class="btn-group dropdown">
					
					<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">

						Ordenar Productos <span class="caret"></span></button>

						<ul class="dropdown-menu" role="menu">

							<?php

							echo '<li class="dropdown-item"><a href="'.$url.$rutas[0].'/1/recientes">Más reciente</a></li>
							<li class="dropdown-item"><a href="'.$url.$rutas[0].'/1/antiguos">Más antiguo</a></li>';

							?>

						</ul>

					</div>

				</div>

				<div class="col-md-6 col-sm-12 organizarProductos" style="text-align: end;">

					<div class="btn-group pull-right">

						<button type="button" class="btn btn-default btnGrid border" id="btnGrid0">

							<i class="fa fa-th" aria-hidden="true"></i>  

							<span class="col-xs-0 pull-right"> GRID</span>

						</button>

						<button type="button" class="btn btn-default btnList border" id="btnList0">

							<i class="fa fa-list" aria-hidden="true"></i> 

							<span class="col-xs-0 pull-right"> LIST</span>

						</button>

					</div>		

				</div>

			</div>

		</div>

	</div>

<!--=====================================
LISTAR PRODUCTOS
======================================-->

<div class="container-fluid productos">

	<div class="container">

		<div class="row">

			<?php

			/*=============================================
			LLAMADO DE PAGINACIÓN
			=============================================*/

			if(isset($rutas[1]) && preg_match('/^[0-9]+$/', $rutas[1])){

				if(isset($rutas[2])){

					if($rutas[2] == "antiguos"){

						$modo = "ASC";
						$_SESSION["ordenar"] = "ASC";

					}else{

						$modo = "DESC";
						$_SESSION["ordenar"] = "DESC";

					}

				}else{

					if(isset($_SESSION["ordenar"])){

						$modo = $_SESSION["ordenar"];

					}else{

						$modo = "DESC";

					}		

				}

				$base = ($rutas[1] - 1)*12;
				$tope = 12;

			}else{

				$rutas[1] = 1;
				$base = 0;
				$tope = 12;
				$modo = "DESC";
				$_SESSION["ordenar"] = "DESC";

			}

			/*=============================================
			LLAMADO DE PRODUCTOS DE CATEGORÍAS, SUBCATEGORÍAS Y DESTACADOS
			=============================================*/

			$ordenar = "id";
			$item1 = "ruta";
			$valor1 = $rutas[0];

			$categoria = ControladorProductos::ctrMostrarCategorias($item1, $valor1);

			if(!$categoria){

				$subCategoria = ControladorProductos::ctrMostrarSubCategorias($item1, $valor1);

				$item2 = "id_subcategoria";
				$valor2 = $subCategoria[0]["id"];

			}else{

				$item2 = "id_categoria";
				$valor2 = $categoria["id"];

			}

			$productos = ControladorProductos::ctrMostrarProductos($ordenar, $item2, $valor2, $base, $tope, $modo);

			$listaProductos = ControladorProductos::ctrListarProductos($ordenar, $item2, $valor2);

			if(!$productos){

				echo '<div class="col-xs-12 error404 text-center">

				<h1><small>¡Oops!</small></h1>

				<h2>Aún no hay productos en esta sección</h2>

				</div>';

			}else{

				echo '<ul class="row col-12 mt-md-3 mb-3 grid0">';

				foreach ($productos as $key => $value) {

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

						if($value["tipo"] == "virtual"){


							echo '<a href="'.$value["rutaAfiliado"].'"><button type="button" class="btn btn-default btn-xs agregarCar border"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Adquirir Ahora">

							<i class="fa fa-shopping-cart" aria-hidden="true"></i>

							</button> </a>';


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

				echo'</ul>

				<ul class="list0" style="display:none">';

				foreach ($productos as $key => $value) {

					if($value["estado"] != 0){

						echo '<li class="row pt-3">

						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">

						<figure>

						<a href="'.$value["ruta"].'" class="pixelProducto">

						<img src="'.$servidor.$value["portada"].'" class="img-responsive" style="width:100%;">

						</a>

						</figure>

						</div>

						<div class="col-lg-9 col-md-7 col-sm-8 col-xs-12">

						<h1>

						<small>

						<a href="'.$value["ruta"].'" class="pixelProducto">

						'.$value["titulo"].'<br>';

						$fecha = date('Y-m-d');
						$fechaActual = strtotime('-30 day', strtotime($fecha));
						$fechaNueva = date('Y-m-d', $fechaActual);

						if($fechaNueva < $value["fecha"]){

							echo '<span class="btn btn-warning btn-xs mt-2 backColor">Nuevo</span> ';

						}

						if($value["oferta"] != 0 && $value["precio"] != 0){

							echo '<span class="btn btn-warning btn-xs mt-2 backColor">'.$value["descuentoOferta"].'% off</span>';

						}		

						echo '</a>

						</small>

						</h1>

						<p class="text-muted">'.$value["titular"].'</p>

						<div class="row">';

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

								<small class="pull-right">$'.$value["precioOferta"].'</small>

								</h2>';

							}else{

								echo '<h2><small>MXN $'.$value["precio"].'</small></h2>';

							}

						}

						echo '<div class="btn-group pull-left p-2 enlaces">

						<button type="button" class="btn btn-default btn-xs deseos border"  idProducto="'.$value["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos">

						<i class="fa fa-heart" aria-hidden="true"></i>

						</button>';

						if($value["tipo"] == "virtual" && $value["precio"] != 0){

							if($value["oferta"] != 0){

								echo '<a href="'.$value["rutaAfiliado"].'"><button type="button" class="btn btn-default btn-xs border solicitarCotizacion"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precioOferta"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Adquirir Ahora">

								<i class="fa fa-shopping-cart" aria-hidden="true"></i>

								</button> </a>';

							}else{

								echo '<a href="'.$value["rutaAfiliado"].'"><button type="button" class="btn btn-default btn-xs border solicitarCotizacion"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Adquirir Ahora">

								<i class="fa fa-shopping-cart" aria-hidden="true"></i>

								</button> </a>';

							}

						}

						if($value["tipo"] == "cotizar" && $value["precio"] != 0){

							if($value["oferta"] != 0){

								echo '<button type="button" class="btn btn-default btn-xs solicitarCotizacion border ver" data-toggle="modal" title="Cotizar Ahora" data-target="#modalCotizar">

								<i class="fas fa-clipboard-list" aria-hidden="true"></i>

								</button>';

							}else{

								echo '<button type="button" class="btn btn-default btn-xs solicitarCotizacion border ver" data-toggle="modal" title="Cotizar Ahora" data-target="#modalCotizar">

								<i class="fas fa-clipboard-list" aria-hidden="true"></i>

								</button>';

							}

						}

						echo '<a href="'.$value["ruta"].'" class="pixelProducto">

						<button type="button" class="btn btn-default btn-xs pt-2 border ver" data-toggle="tooltip" title="Ver producto">

						<i class="fa fa-eye" aria-hidden="true"></i>

						</button>

						</div>

						</a>

						</div>

						</div>

						<div class="col-xs-12"><hr></div>

						</li>';

					}

				}

				echo '</ul>';


			}

			?>

			<!--=====================================
			PAGINACIÓN
			======================================-->

			<div class="row col-12 col-xs-12 justify-content-center">

			<?php 

			if(count($listaProductos) != 0){

				$pagProductos = ceil(count($listaProductos)/12);

				if($pagProductos > 4){

						/*=============================================
						LOS BOTONES DE LAS PRIMERAS 4 PÁGINAS Y LA ÚLTIMA PÁG
						=============================================*/

						if($rutas[1] == 1){
							echo '<ul class=" pagination">';

							for($i = 1; $i <= 4; $i ++){

								echo '<li class="page-item" id="item'.$i.'"><a class="page-link" href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';

							}

							echo ' <li class="disabled"></li>
							<li id="item'.$pagProductos.'"><a class="page-link"href="'.$url.$rutas[0].'/'.$pagProductos.'">'.$pagProductos.'</a></li>
							<li><a class="page-link" href="'.$url.$rutas[0].'/2"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

							</ul>';

						}

						/*=============================================
						LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ABAJO
						=============================================*/

						else if($rutas[1] != $pagProductos && 
							$rutas[1] != 1 &&
							$rutas[1] <  ($pagProductos/2) &&
							$rutas[1] < ($pagProductos-3)
						){

							$numPagActual = $rutas[1];

							echo '<ul class="pagination">
							<li class="page-item"><a class="page-link" href="'.$url.$rutas[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> ';

							for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){

								echo '<li class="page-item" id="item'.$i.'"><a class="page-link" href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';

							}

							echo '
							<li class="page-item" id="item'.$pagProductos.'"><a class="page-link" href="'.$url.$rutas[0].'/'.$pagProductos.'">'.$pagProductos.'</a></li>
							<li class="page-item"><a  class="page-link" href="'.$url.$rutas[0].'/'.($numPagActual+1).'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

							</ul>';

						}

						/*=============================================
						LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ARRIBA
						=============================================*/

						else if($rutas[1] != $pagProductos && 
							$rutas[1] != 1 &&
							$rutas[1] >=  ($pagProductos/2) &&
							$rutas[1] < ($pagProductos-3)
						){

							$numPagActual = $rutas[1];
							
							echo '<ul class="pagination">
							<li class="page-item disabled"><a class="page-link" href="'.$url.$rutas[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
							<li class="page-item" id="item1"><a class="page-link"href="'.$url.$rutas[0].'/1"></a></li>
							';

							for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){

								echo '<li class="page-item" id="item'.$i.'"><a class="page-link" href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';

							}


							echo '  <li class="page-item"><a class="page-link" href="'.$url.$rutas[0].'/'.($numPagActual+1).'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
							</ul>';


						}

						/*=============================================
						LOS BOTONES DE LAS ÚLTIMAS 4 PÁGINAS Y LA PRIMERA PÁG
						=============================================*/

						else{

							$numPagActual = $rutas[1];

							echo '<ul class="pagination">
							<li class="page-item"><a class="page-link" href="'.$url.$rutas[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
							<li class="page-item disabled" id="item1"><a class="page-link" href="'.$url.$rutas[0].'/1">...</a></li>
							';

							for($i = ($pagProductos-3); $i <= $pagProductos; $i ++){

								echo '<li class="page-item" id="item'.$i.'"><a class="page-link" href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';

							}

							echo ' </ul>';

						}

					}else{

						echo '<ul class="pagination">';
						
						for($i = 1; $i <= $pagProductos; $i ++){

							echo '<li class="page-item" id="item'.$i.'"><a class="page-link" href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';

						}

						echo '</ul>';

					}

				}


				?>


				</div>

				</div>

				</div>

				</div>


				<!--=====================================
				VENTANA MODAL PARA COTIZAR
				======================================-->

				<!-- The Modal -->
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
				<input id="productosCotizar" type="text" class="form-control" name="productosCotizar" placeholder="¿Qué Producto?" value="">
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
				<label for="comment" class="text-muted">¿Tiene dudas o comentarios acerca de su material?: <br>
				<span class="text-info"><small>Campo Obligatorio, máximo 600 caracteres.</small></span></label>

				<textarea class="form-control" name="dudasCotizar" id="dudasCotizar" rows="5" maxlength="600" value="" required></textarea>
				</div>

				</form>

				<h5 class="text-center text-muted"><small>EN <b>MEVASA</b> NOS ESFORZAMOS POR BRINDARLE SERVICIO Y CALIDAD ¡AL MEJOR PRECIO!</small></h5>

				<input type="submit" class="btn btn-default backColor btn-block botonCotizar" value="SOLICITAR COTIZACIÓN" id="solicitarCotizacion">

				</div>

				<!-- Modal footer -->
				<div class="modal-footer mt-3">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">¡Cerrar!</button>
				</div>

				</form>

				</div>

				</div>

				</div>

				</div>



				<!--====  VENTANA MODAL PARA COTIZAR  ====-->

