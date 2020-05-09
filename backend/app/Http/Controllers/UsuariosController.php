<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use App\Plantilla;
use App\Administradores;

class UsuariosController extends Controller
{
    public function index()
	{

		$usuarios = Usuarios::all();
		$plantilla = Plantilla::all();
		$administradores = Administradores::all();
			

		return view("paginas.usuarios", array("usuarios"=>$usuarios, "plantilla"=>$plantilla, "administradores"=>$administradores));

	}
}
