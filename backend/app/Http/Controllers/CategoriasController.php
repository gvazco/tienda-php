<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorias;
use App\Plantilla;
use App\Administradores;

class CategoriasController extends Controller
{
    
    public function index()
	{

		$categorias = Categorias::all();
		$plantilla = Plantilla::all();
		$administradores = Administradores::all();
			

		return view("paginas.categorias", array("categorias"=>$categorias, "plantilla"=>$plantilla, "administradores"=>$administradores));

	}

}
