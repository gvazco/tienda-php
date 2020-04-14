<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comercio;
use App\Plantilla;

class ComercioController extends Controller
{

    /*===================================================
    =            Mostrar todos los registros            =
    ===================================================*/

    public function index()
    {

    	$comercio = Comercio::all();
    	$plantilla = Plantilla::all();

    	return view("paginas.comercio", array("comercio"=>$comercio, "plantilla"=>$plantilla));

    }

	/*==============================================
	=            Actualizar un Registro            =
	==============================================*/

	public function update($id, Request $request){

		//Recoger lo datos
		$datos = array("impuesto"=>$request->input("impuesto"),
			"envioNacional"=>$request->input("envioNacional"),
			"envioInternacional"=>$request->input("envioInternacional"),
			"tasaMinimaNal"=>$request->input("tasaMinimaNal"),
			"tasaMinimaInt"=>$request->input("tasaMinimaInt"),
			"pais"=>$request->input("pais"),
			"modoPaypal"=>$request->input("modoPaypal"),
			"modoMercado"=>$request->input("modoMercado"),
			"clienteIdPaypal"=>$request->input("clienteIdPaypal"),
			"llaveSecretaPaypal"=>$request->input("llaveSecretaPaypal"),
			"publicKeyMercado"=>$request->input("publicKeyMercado"),
			"accessTokenMercado"=>$request->input("accessTokenMercado")



		);

		//Validar datos
		if(!empty($datos)){

			$validar = \Validator::make($datos ,[

				"impuesto" => 'required',
				"envioNacional" => 'required',
				"envioInternacional" => 'required',
				"tasaMinimaNal" => 'required',
				"tasaMinimaInt" => 'required',
				"pais"=>'required',
				"modoPaypal"=>'required',
				"modoMercado"=>'required',
				"clienteIdPaypal"=>'required',
				"llaveSecretaPaypal"=>'required',
				"publicKeyMercado"=>'required',
				"accessTokenMercado"=>'required'


			]);

			//Revisar la validación
			if($validar->fails()){

				return redirect("/")->with("no-validacion", "");

			}else{

			//Guarda Información en BD
				$actualizar = array("impuesto" => $datos["impuesto"],
					"envioNacional" => $datos["envioNacional"],
					"envioInternacional" => $datos["envioInternacional"],
					"tasaMinimaNal" => $datos["tasaMinimaNal"],
					"tasaMinimaInt" => $datos["tasaMinimaInt"],
					"tasaMinimaInt" => $datos["tasaMinimaInt"],
					"pais"=>$datos["pais"],
					"modoPaypal"=>$datos["modoPaypal"],
					"modoMercado"=>$datos["modoMercado"],
					"clienteIdPaypal"=>$datos["clienteIdPaypal"],
					"llaveSecretaPaypal"=>$datos["llaveSecretaPaypal"],
					"publicKeyMercado"=>$datos["publicKeyMercado"],
					"accessTokenMercado"=>$datos["accessTokenMercado"]

				);

				$comercio = Comercio::where("id", $id)->update($actualizar);

				return redirect("/")->with("ok-editar", ""); 

			}

		}else{

			return redirect("/")->with("error", ""); 

		}

	}

} 
