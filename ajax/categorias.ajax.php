<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{

	/*=============================================
	VISTA SUBCATEGORIAS
	=============================================*/	

	public $idCategoria;
	public $item;
	public $tabla;

	public function ajaxVistaSubcategorias(){

		$tabla = $this->tabla;
		$item = $this->item;
		$valor = $this->idCategoria;

		$respuesta = ControladorCategorias::ctrMostrarCATySUB($tabla, $item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
VISTA SUBCATEGORIAS
=============================================*/	

if(isset($_POST["tabla"])){

	$subcategorias = new AjaxCategorias();
	$subcategorias -> idCategoria = $_POST["idCategoria"];
	$subcategorias -> item = $_POST["item"];
	$subcategorias -> tabla = $_POST["tabla"];
	$subcategorias -> ajaxVistaSubcategorias();
}
