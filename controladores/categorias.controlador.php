<?php

/*=============================================
CONTROLADOR DE CATEGORIAS Y SUBCATEGORÍAS
=============================================*/

class ControladorCategorias{

	/*=============================================
	MOSTRAR CATEGORIAS Y SUBCATEGORIAS
	=============================================*/

	static public function ctrMostrarCATySUB($tabla, $item, $valor){

		$respuesta = ModeloCategorias::mdlMostrarCATySUB($tabla, $item, $valor);

		return $respuesta;

	}

}