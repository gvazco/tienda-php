<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ventas;
use App\Plantilla;
use App\Administradores;

class VentasController extends Controller
{
    
    public function index()
	{

		$ventas = Ventas::all();
		$plantilla = Plantilla::all();
		$administradores = Administradores::all();
			

		return view("paginas.ventas", array("ventas"=>$ventas, "plantilla"=>$plantilla, "administradores"=>$administradores));

	}

}
