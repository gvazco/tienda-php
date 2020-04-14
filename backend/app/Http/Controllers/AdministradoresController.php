<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administradores;
use App\Plantilla;

class AdministradoresController extends Controller
{
    
    public function index()
	{

		$administradores = Administradores::all();
		$plantilla = Plantilla::all();


		return view("paginas.administradores", array("administradores"=>$administradores, "plantilla"=>$plantilla));

	}

}
