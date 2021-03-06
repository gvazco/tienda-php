<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Plantilla;
use App\Administradores; 

class SlideController extends Controller
{

	/*=============================================
	Mostrar todos los registros
	=============================================*/
    public function index()
	{

		$slide = Slide::all();
		$plantilla = Plantilla::all();
		$administradores = Administradores::all();
			

		return view("paginas.slide", array("slide"=>$slide, "plantilla"=>$plantilla, "administradores"=>$administradores));

	} 

	public function store(Request $request)
	{

		

	}

	/*=============================================
	Mostrar un solo registro
	=============================================*/
	public function show()
	{

	}

	/*=============================================
	Editar un registro
	=============================================*/
	public function update()
	{

	}

	/*=============================================
    Eliminar un registro
    =============================================*/

    public function destroy()
    {

    }
}
