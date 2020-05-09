<!--=====================================
BANNER
======================================-->

<?php

$servidor = Ruta::ctrRutaServidor();

$ruta = "sin-categoria";

$banner = ControladorProductos::ctrMostrarBanner($ruta);

if($banner != null){

	if($banner["estado"] != 0){

		echo '<figure class="banner mt-2">

		<a href="https://techosymantenimientos.com.mx/portafolio" style="color:white;">

		<img src="'.$servidor.$banner["img"].'" class="img-responsive" width="100%">

		<h1 class="bannerPrincipal">¡VISITA NUESTRO BLOG!</h1>	

		</a>


		</figure>';

	}

}


/*=============================================
PRODUCTOS DESTACADOS
=============================================*/

$titulosModulos = array("LÁMINA", "ACCESORIOS", "ACEROS Y FERRETERIA", "HERRAMIENTAS", "TUTORIALES");
$rutaModulos = array("lamina","accesorios","aceros-ferreteria", "herramientas", "tutoriales");

$base = mt_rand(0,6);
$tope = 4;

if($titulosModulos[0] == "LÁMINA"){

	$ordenar = "id";
	$item = "id_categoria";
	$valor = 1;
	$modo = "DESC";

	$lamina = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);

}


if($titulosModulos[1] == "ACCESORIOS"){

	$ordenar = "id";
	$item = "id_categoria";
	$valor = 2;
	$modo = "DESC";

	$accesorios = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);

}

if($titulosModulos[2] == "ACEROS Y FERRETERIA"){

	$ordenar = "id";
	$item = "id_categoria";
	$valor = 3;
	$modo = "DESC";

	$aceros = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);

}

if($titulosModulos[3] == "HERRAMIENTAS"){

	$ordenar = "id";
	$item = "id_categoria";
	$valor = 4;
	$modo = "DESC";

	$herramientas = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);

}

if($titulosModulos[4] == "TUTORIALES"){

	$ordenar = "id";
	$item = "id_categoria";
	$valor = 5;
	$modo = "DESC";

	$tutoriales = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);

}

$modulos = array($lamina, $accesorios, $aceros, $herramientas, $tutoriales);

for($i = 0; $i < count($titulosModulos); $i++){

	echo '<div class="container-fluid mt-2 barraProductos">

	<div class="container">

	<div class="row">

	<div class="col-12 col-xs-12 text-right d-none d-sm-block organizarProductos">

	<div class="btn-group pull-right mb-2">

	<button type="button" class="btn btn-default border btnGrid" id="btnGrid'.$i.'">

	<i class="fa fa-th" aria-hidden="true"></i>  

	<span class="col-xs-0 pull-right"> GRID</span>

	</button>

	<button type="button" class="btn btn-default border btnList" id="btnList'.$i.'">

	<i class="fa fa-list" aria-hidden="true"></i> 

	<span class="col-xs-0 pull-right"> LIST</span>

	</button>

	</div>		

	</div>

	</div>

	</div>

	</div>


	<div class="container-fluid productos mt-1">
	
	<div class="container">
	
	<div class="row">

	<div class="col-12 col-xs-12 tituloDestacado" style="display:contents;">

	<div class="col-sm-6 col-xs-12">
	
	<h1><small>'.$titulosModulos[$i].' </small></h1>

	</div>

	<div class="col-sm-6 col-xs-12 text-right">
	
	<a href="'.$rutaModulos[$i].' ">
	
	<button class="btn btn-default backColor pull-right">

	VER MÁS <span class="fa fa-chevron-right"></span>

	</button>

	</a>

	</div>

	</div>

	</div>

	</div>

	</div>


	<div class="container-fluid productos">

	<div class="container">

	<div class="row">

	<ul class="row col-12 mb-3 grid'.$i.'">';	

	foreach ($modulos[$i] as $key => $value) {

		if($value["estado"] != 0){

			echo '<li class="card col-12 col-lg-3 col-md-6 border-0 mt-4 mb-4 mb-lg-0 p-3"  style="background:#eee">

			<figure>

			<a href="'.$value["ruta"].'" class="pixelProducto" >

			<center>
			<img src="'.$servidor.$value["portada"].'" class="img-responsive" width="100%">
			</center>

			</a>

			</figure>

			<div class="card-body border shadow-sm p-4 p-lg-3 p-xl-2 bg-white">

			<h6 class="card-title" style="text-align:center;">

			<a href="'.$value["ruta"].'" target="_blank" class="pixelProducto">

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

	echo '</ul>

	<ul class="list'.$i.'" style="display:none">';

	foreach ($modulos[$i] as $key => $value) {

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

	echo '</ul>

	</div>

	</div>

	</div>';

}

?>

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
							<input id="productoCotizar" type="text" class="form-control" name="productoCotizar" placeholder="¿Qué Producto?" value="">
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

				</div>
			</div>
		</div>

	</div>


	<!--====  VENTANA MODAL PARA COTIZAR  ====-->

