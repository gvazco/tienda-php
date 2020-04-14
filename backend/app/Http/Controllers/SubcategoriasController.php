<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategorias;
use App\Plantilla;

class SubcategoriasController extends Controller
{

    public function index()
	{

		$subcategorias = Subcategorias::all();
		$plantilla = Plantilla::all();


		return view("paginas.subcategorias", array("subcategorias"=>$subcategorias, "plantilla"=>$plantilla));

	}

}
