<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ventas;
use App\Plantilla;

class VentasController extends Controller
{
    
    public function index()
	{

		$ventas = Ventas::all();
		$plantilla = Plantilla::all();


		return view("paginas.ventas", array("ventas"=>$ventas, "plantilla"=>$plantilla));

	}

}
