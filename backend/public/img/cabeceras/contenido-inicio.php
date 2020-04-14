<?php 


if(isset($rutas[0]) && is_numeric($rutas[0])){

	$paginaActual = $rutas[0];

}else{

	$paginaActual = 1;

}

$articulosDestacados = ControladorBlog::ctrArticulosDestacados(null, null);

$anuncios = ControladorBlog::ctrTraerAnuncios("inicio");


?>


<!--=====================================
CONTENIDO INICIO
======================================-->

<div class="container-fluid bg-white contenidoInicio pb-4">
	
	<div class="container">
		
		<div class="row">
			
			<!-- COLUMNA IZQUIERDA -->

			<div class="col-12 col-md-8 col-lg-9 p-0 pr-lg-5">


				<?php foreach ($articulos as $key => $value): ?>
				

					<!-- ARTÍCULOS -->

					<div class="row">
						
						<div class="col-12 col-lg-5">

							<a href="<?php echo $blog["dominio"].$value["ruta_categoria"]."/".$value["ruta_articulo"]; ?>"><h5 class="d-block d-lg-none py-3"><?php echo $value["titulo_articulo"]; ?></h5></a>
				
							<a href="<?php echo $blog["dominio"].$value["ruta_categoria"]."/".$value["ruta_articulo"]; ?>"><img src="<?php echo $blog["servidor"];?><?php echo $value["portada_articulo"]; ?>" alt="<?php echo $value["titulo_articulo"]; ?>" class="img-fluid" width="100%"></a>

						</div>

						<div class="col-12 col-lg-7 introArticulo">
							
							<a href="<?php echo $blog["dominio"].$value["ruta_categoria"]."/".$value["ruta_articulo"]; ?>"><h4 class="d-none d-lg-block"><?php echo $value["titulo_articulo"]; ?></h4></a>
							
							<p class="my-2 my-lg-5 text-justify"><?php echo $value["descripcion_articulo"]; ?></p>

							<a href="<?php echo $blog["dominio"].$value["ruta_categoria"]."/".$value["ruta_articulo"]; ?>" class="float-right">Leer Más</a>

							<div class="fecha mt-5"><?php echo $value["fecha_articulo"]; ?></div>

						</div>


					</div>

					<hr class="mb-4 mb-lg-5" style="border: 1px solid #79FF39">
					
				<?php endforeach ?>

				<div class="container d-none d-md-block">
					
					<ul class="pagination justify-content-center" totalPaginas="<?php echo $totalPaginas; ?>" paginaActual="<?php echo $paginaActual; ?>" rutaPagina></ul>

				</div>

			</div>

			<!-- COLUMNA DERECHA -->

			<div class="d-none d-md-block pt-md-4 pt-lg-0 col-md-4 col-lg-3">

				<!-- SOBRE MI -->

				<?php 

					echo $blog["sobre_mi"];
				 
				 ?>

				 <!-- FANPAGE FACEBOOK -->

				<iframe name="f394e6209d2b89" width="100%" height="420px" title="fb:page Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v3.2/plugins/page.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D45%23cb%3Dfcd4228462f1dc%26domain%3Dtechosymantenimientos.com.mx%26origin%3Dhttps%253A%252F%252Ftechosymantenimientos.com.mx%252Ff186db6246732f4%26relation%3Dparent.parent&amp;container_width=247&amp;height=580&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fmevasacomercializadora%2F&amp;locale=es_LA&amp;sdk=joey&amp;show_facepile=true&amp;tabs=timeline&amp;width=340" style="border: none; visibility: visible; width: 100%; height: 420px;" class=""></iframe>



				<!-- Artículos destacados -->

				<div class="my-4">
					
					<h4>Artículos Destacados</h4>

					<?php foreach ($articulosDestacados as $key => $value): 


						$categoria = ControladorBlog::ctrMostrarCategorias("id_categoria", $value["id_cat"]); 


					?>

						<div class="d-flex my-3">
						
							<div class="w-100 w-xl-50 pr-3 pt-2">
								
								<a href="<?php echo $blog["dominio"].$categoria[0]["ruta_categoria"]."/".$value["ruta_articulo"];?>">

									<img src="<?php echo $blog["servidor"].$value["portada_articulo"]; ?>" alt="<?php echo $value["titulo_articulo"];?>" class="img-fluid">

								</a>

							</div>

							<div>

								<a href="<?php echo $blog["dominio"].$categoria[0]["ruta_categoria"]."/".$value["ruta_articulo"];?>" class="text-secondary">

									<p class="small"><?php echo substr($value["descripcion_articulo"],0,-110)."...";?></p>

								</a>

							</div>

						</div>
						
					<?php endforeach ?>


				</div>

				
				<!-- PUBLICIDAD -->

				<?php foreach ($anuncios as $key => $value): ?>

					<?php echo $value["codigo_anuncio"]; ?>
					
				<?php endforeach ?>
						
				
			</div>

		</div>

	</div>

</div>