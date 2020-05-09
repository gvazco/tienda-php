<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitas;
use App\Plantilla;
use App\Administradores;

class VisitasController extends Controller
{

    public function index()
	{

		$visitas = Visitas::all();
		$plantilla = Plantilla::all();
		$administradores = Administradores::all();
		


		return view("paginas.visitas", array("visitas"=>$visitas, "plantilla"=>$plantilla, "administradores"=>$administradores));

	}

}
