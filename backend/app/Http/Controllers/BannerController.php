<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Plantilla;
use App\Administradores;

class BannerController extends Controller
{
    
    public function index()
	{

		$banner = Banner::all();
		$plantilla = Plantilla::all();
		$administradores = Administradores::all();


		return view("paginas.banner", array("banner"=>$banner, "plantilla"=>$plantilla, "administradores"=>$administradores));

	}

}
