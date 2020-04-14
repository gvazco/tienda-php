<?php 
$servidor = Ruta::ctrRutaServidor();
$slide = ControladorSlide::ctrMostrarSlide(); 
?>
<!--=====================================
SLIDESHOW  
======================================-->

<div id="slide" class="carousel slide carousel-fade" data-ride="carousel" data-interval="4000">

	<ol class="carousel-indicators">

		<?php 

		for($i = 1; $i <= count($slide); $i++){

			echo'<li data-target="#carousel" data-slide-to="'.$i.'" class=""></li>';
		}

		?>
		
	</ol>

	<ul class="carousel-inner">

	<!--=====================================
	DIAPOSITIVAS
	======================================-->

	<?php

	$active="active";

	foreach ($slide as $key => $value){

		$estiloImgProducto = json_decode($value["estiloImgProducto"], true);
		$estiloTextoSlide = json_decode($value["estiloTextoSlide"], true);
		$titulo1 = json_decode($value["titulo1"], true);
		$titulo2 = json_decode($value["titulo2"], true);
		$titulo3 = json_decode($value["titulo3"], true);

		echo '<li id="item" class="carousel-item '.$active.'">

		<img src="'.$servidor.$value["imgFondo"].'" width="100%" height="100%">

		<div class="slideOpciones '.$value["tipoSlide"].'">';

		if($value["imgProducto"] != ""){

			echo '<img class="imgProducto" src="'.$servidor.$value["imgProducto"].'" style="height: auto; top:'.$estiloImgProducto["top"].'%; right:'.$estiloImgProducto["right"].'%; width:'.$estiloImgProducto["width"].'%; left:'.$estiloImgProducto["left"].'%">';

		}

		echo'<div class="textosSlide" style="top:'.$estiloTextoSlide["top"].'%; left:'.$estiloTextoSlide["left"].'%; width:'.$estiloTextoSlide["width"].'%; right:'.$estiloTextoSlide["right"].'%">

		<h1 style="color:'.$titulo1["color"].'">'.$titulo1["texto"].'</h1>

		<h2 style="color:'.$titulo2["color"].'">'.$titulo2["texto"].'</h2>

		<h3 style="color:'.$titulo3["color"].'">'.$titulo3["texto"].'</h3>';

		if($value["boton"] != ""){

			echo '<a href="'.$value["url"].'">

			<button class="btn btn-default backColor text-uppercase">

			'.$value["boton"].' <span class="fa fa-chevron-right"></span>

			</button>

			</a>';

		}

		echo'</div>   

		</div>

		</li>';

		$active="";
	}

	?>

</ul>

<a class="carousel-control-prev" href="#slide" id="retroceder" data-slide="prev">
	<span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#slide"id="avanzar" data-slide="next">
	<span class="carousel-control-next-icon"></span>
</a>
</div>

<center>

	<button id="btnSlide" class="backColor mt-1">

		<i class="fa fa-angle-up"></i>

	</button>

</center>