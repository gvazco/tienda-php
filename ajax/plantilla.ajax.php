<?php

require_once "../controladores/plantilla.controlador.php";
require_once "../modelos/plantilla.modelo.php";

class AjaxPlantilla{

	static public function ajaxEstiloPlantilla(){

		$respuesta = ControladorPlantilla::ctrEstiloPlantilla();

		echo json_encode($respuesta);

	}


}

$objeto = new AjaxPlantilla();
$objeto -> ajaxEstiloPlantilla();
