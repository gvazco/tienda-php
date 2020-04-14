<?php

$url = Ruta::ctrRuta();

?>

<!--=====================================
BREADCRUMB CARRITO DE COMPRAS
======================================-->

<div class="container-fluid">
	
	<div class="container">
		
		<div class="row">
			
			<ul class="col-12 col-xs-12 breadcrumb fondoBreadcrumb text-uppercase pl-5">
				
				<li><a href="<?php echo $url;  ?>">INICIO</a> /&nbsp;</li>
				<li class="active pagActiva"><?php echo $rutas[0] ?></li>

			</ul>

		</div>

	</div>

</div>

<!--=====================================
TABLA CARRITO DE COMPRAS
======================================-->

<div class="container-fluid">

	<div class="container">

		<div class="card col-12 bg-white border-0 mt-2 mb-4 ml-lg-0 p-3" >
			
			<!--=====================================
			CABECERA CARRITO DE COMPRAS
			======================================-->

			<div class="row cabeceraCarrito pr-3">
				
				<div class="col-md-6 col-sm-7 col-xs-12 text-center">
					
					<h3>
						<small>PRODUCTO</small>
					</h3>

				</div>

				<div class="col-md-2 col-sm-1 col-xs-0 text-center">
					
					<h3>
						<small>PRECIO</small>
					</h3>

				</div>

				<div class="col-sm-2 col-xs-0 text-center">
					
					<h3>
						<small>CANTIDAD</small>
					</h3>

				</div>

				<div class="col-sm-2 col-xs-0 text-center">
					
					<h3>
						<small>SUBTOTAL</small>
					</h3>

				</div>

			</div>

			<!--=====================================
			CUERPO CARRITO DE COMPRAS
			======================================-->

			<div class="card-body col-12 cuerpoCarrito">

				
			</div>

			<!--=====================================
			SUMA DEL TOTAL DE PRODUCTOS
			======================================-->

			<div class="panel-body sumaCarrito">

				<div class="col-md-4 col-sm-6 col-xs-12 float-right well">
					
					<div class="col-xs-6" style="text-align: right;">
						
						<h4>TOTAL:</h4>

					</div>

					<div class="col-xs-6" style="text-align: right;">

						<h4 class="sumaSubTotal">
							
							<strong>MXN $<span>21</span></strong>

						</h4>

					</div> 

				</div>

			</div>
			

			<!--=====================================
			BOTÓN CHECKOUT
			======================================-->

			<div class="panel-heading cabeceraCheckout">

				<?php 

				if(isset($_SESSION["validarSesion"])){

					if($_SESSION["validarSesion"] == "ok"){

						echo '<a id="btnCheckout" idUsuario="'.$_SESSION["id"].'" href="#modalCheckout" data-toggle="modal"><button class="btn btn-default backColor btn-lg float-right">REALIZAR PAGO</button></a>';

					}

				}else{

					echo '<a href="#modalIngreso" data-toggle="modal"><button class="btn btn-default backColor btn-lg float-right">REALIZAR PAGO</button></a>';

				}

				?>
				
				

			</div>

		</div>

	</div>

</div>

<!--=====================================
VENTANA MODAL PARA CHECKOUT
======================================-->

<div id="modalCheckout" class="modal  fade modalFormulario" role="dialog">
	
	<div class="modal-content modal-dialog modal-lg">

		<div class="modal-body modalTitulo">
			
			<h3 class="backColor">REALIZAR PAGO</h3>

			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<?php 

			$respuesta = ControladorCarrito::ctrMostrarTarifas();

			echo '<input type="hidden" id="tasaImpuesto" 
			value="'.$respuesta["impuesto"].'">

			<input type="hidden" id="envioNacional" 
			value="'.$respuesta["envioNacional"].'">

			<input type="hidden" id="envioInternacional" 
			value="'.$respuesta["envioInternacional"].'">

			<input type="hidden" id="tasaMinimaNal" 
			value="'.$respuesta["tasaMinimaNal"].'">

			<input type="hidden" id="tasaMinimaInt" 
			value="'.$respuesta["tasaMinimaInt"].'">

			<input type="hidden" id="tasaPais" 
			value="'.$respuesta["pais"].'">

			';

			?>

			<div class="contenidoCheckout">
				
				<div class="formEnvio row">
					
					<h4 class="text-center well text-muted text-uppercase">Información de envío</h4>

					<div class="col-xs-12 seleccionePais">
						
						<select class="form-control" id="seleccionarPais">
							
							<option value="Zona de Envío"></option>

						</select>

					</div>

				</div>

				<br>

				<h4 class="text-center well text-muted text-uppercase">Elige la forma de pago</h4>

				<div class="formaPago row d-flex justify-content-around">

					<!-- <figure class="col-xs-6 p-2">
						
						<center>
							
							<input id="checkMercado" type="radio" name="pago" value="mercado" checked>

						</center>

						<img src="<?php //echo $url; ?>vistas/img/plantilla/mercado.jpg" class="img-thumbnail" style="max-width:350px;height:165px">

					</figure> -->
					

					<figure class="col-xs-12 p-2">
						
						<center>
							
							<input id="checkPaypal" type="radio" name="pago" value="paypal" checked>

						</center>	
						
						<img src="<?php echo $url; ?>vistas/img/plantilla/paypal.jpg" class="img-thumbnail">		

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

							<!-- Mostrar productos definitivos a comprar -->

						</tbody>

					</table>

					<div class="col-lg-6 col-xs-12"> <img class="imgLogo" src="<?php echo $url; ?>vistas/img/plantilla/logo.png" alt="mevasa logo"></div>

					<div class="col-lg-6 col-xs-12 text-right float-right">
						
						<table class="table table-striped tablaTasas">
							
							<tbody>
								
								<tr>
									<td>Subtotal:</td>	
									<td><span class="cambioDivisa">MXN</span> $<span class="valorSubtotal" valor="0">0</span></td>	
								</tr>

								<tr>
									<td>Envío:</td>	
									<td><span class="cambioDivisa">MXN</span> $<span class="valorTotalEnvio" valor="0">0</span></td>	
								</tr>

								<tr>
									<td>IVA (16%):</td>	
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

					
					<button class="btn btn-block btn-lg btn-default backColor btnPagar" ">PAGAR</button>

					<!-- <form class="btn btn-block btn-lg btn-default formMercado" style="background-color: #009ee3;" action="<?php //echo $url.'perfil' ?>" method="POST">
						<script
						src="https://www.mercadopago.com.mx/integrations/v1/web-tokenize-checkout.js"
						data-public-key="TEST-bbdddb72-2aa3-4002-9436-43bab01c570f"
						data-transaction-amount="100.00">
					</script>
				</form> -->
				

				<?php

// 				if(isset($_REQUEST["token"])){

// 					$token = $_REQUEST["token"];
// 					$payment_method_id = $_REQUEST["payment_method_id"];
// 					$installments = $_REQUEST["installments"];
// 					$issuer_id = $_REQUEST["issuer_id"];

// 					MercadoPago\SDK::setAccessToken("TEST-1740649216690160-040200-fe88072e710f860ab0f30cb002a1e064-229945933
// ");
//     //...
// 					$payment = new MercadoPago\Payment();
// 					$payment->transaction_amount = 100;
// 					$payment->token = $token;
// 					$payment->description = "Practical Aluminum Shoes";
// 					$payment->installments = $installments;
// 					$payment->payment_method_id = $payment_method_id;
// 					$payment->issuer_id = $issuer_id;
// 					$payment->payer = array(
// 						"email" => "thalia@yahoo.com"
// 					);
//     // Guarda y postea el pago
// 					$payment->save();
//     //...
//     // Imprime el estado del pago
// 					echo $payment->status;
//     //...

// 				}

				?>

			</div>

		</div>

	</div>

	<div class="modal-footer">

	</div>

</div>

</div>
