<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Plantilla;
use App\Administradores;

class SlideController extends Controller
{
    
    public function index()
	{

		$slide = Slide::all();
		$plantilla = Plantilla::all();
		$administradores = Administradores::all();
			

		return view("paginas.slide", array("slide"=>$slide, "plantilla"=>$plantilla, "administradores"=>$administradores));

	}

}
