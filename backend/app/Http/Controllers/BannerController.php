<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Plantilla;

class BannerController extends Controller
{
    
    public function index()
	{

		$banner = Banner::all();
		$plantilla = Plantilla::all();


		return view("paginas.banner", array("banner"=>$banner, "plantilla"=>$plantilla));

	}

}
