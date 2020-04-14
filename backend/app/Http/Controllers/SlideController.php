<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Plantilla;

class SlideController extends Controller
{
    
    public function index()
	{

		$slide = Slide::all();
		$plantilla = Plantilla::all();


		return view("paginas.slide", array("slide"=>$slide, "plantilla"=>$plantilla));

	}

}
