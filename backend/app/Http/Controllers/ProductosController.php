<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Plantilla;
use App\Administradores;

class ProductosController extends Controller
{
    public function index()
	{

		$productos = Productos::all();
		$plantilla = Plantilla::all();
		$administradores = Administradores::all();
		


		return view("paginas.productos", array("productos"=>$productos, "plantilla"=>$plantilla, "administradores"=>$administradores));

	}
}
