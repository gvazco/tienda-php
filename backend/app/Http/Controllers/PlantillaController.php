<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plantilla;
use App\Admistradores;
use App\Administradores;

class PlantillaController extends Controller
{

	/*===================================================
	=            Mostrar todos los registros            =
	===================================================*/
	
    public function index()
	{

		$plantilla = Plantilla::all();
		$administradores = Administradores::all();

		return view("paginas.plantilla", array("plantilla"=>$plantilla, "administradores"=>$administradores));

	}

	/*==============================================
	=            Actualizar un Registro            =
	==============================================*/
	
	public function update($id, Request $request)
	{

		//Recoger los datos
		$datos = array("dominio"=>$request->input("dominio"),
						"servidor"=>$request->input("servidor"),
						"titulo"=>$request->input("titulo"),
						"descripcion"=>$request->input("descripcion"),
						"palabras_claves"=>$request->input("palabras_claves"),
						"redesSociales"=>$request->input("redesSociales"),
						"logo_actual"=>$request->input("logo_actual"),
						"portada_actual"=>$request->input("portada_actual"),
						"icono_actual"=>$request->input("icono_actual"),
						"barraSuperior"=>$request->input("barraSuperior"),
						"textoSuperior"=>$request->input("textoSuperior"),
						"colorFondo"=>$request->input("colorFondo"),
						"colorTexto"=>$request->input("colorTexto"),
						"apiFacebook"=>$request->input("apiFacebook"),
						"pixelFacebook"=>$request->input("pixelFacebook"),
						"googleAnalytics"=>$request->input("googleAnalytics")

						);

		//Recoger las imágenes
		$logo = array("logo_temporal"=>$request->file("logo"));
		$portada = array("portada_temporal"=>$request->file("portada"));
		$icono = array("icono_temporal"=>$request->file("icono"));

		//Validar datos
		if(!empty($datos)){

			$validar = \Validator::make($datos, [

				"dominio" => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i',
				"servidor" => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i',
				"titulo" => 'required|regex:/^[-\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/i',
				"descripcion" => 'required|regex:/^[=\\&\\$\\,\\;\\(\\)\\-\\_\\*\\"\\<\\>\\?\\¿\\¡\\!\\:\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/i',
				"palabras_claves" => 'required|regex:/^[,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/i',
				"redesSociales" => 'required',
				"logo_actual" => 'required',
				"portada_actual" => 'required',
				"icono_actual" => 'required',
				"barraSuperior" => 'required|regex:/^[#\\0-9a-zA-Z]+$/i',
				"textoSuperior" => 'required|regex:/^[#\\0-9a-zA-Z]+$/i',
				"colorFondo" => 'required|regex:/^[#\\0-9a-zA-Z]+$/i',
				"colorTexto" => 'required|regex:/^[#\\0-9a-zA-Z]+$/i',
				"apiFacebook" => 'required',
				"pixelFacebook" => 'required',
				"googleAnalytics" => 'required'

			]);

			//Validar imágenes logo
			if($logo["logo_temporal"] != ""){

				$validarLogo = \Validator::make($logo, [

					"logo_temporal" => 'required|image|mimes:jpg,jpeg,png|max:2000000'

				]);

				if($validarLogo->fails()){

					return redirect("")->with("no-validacion-imagen", "");
				}

			}

			//Validar imágenes portada
			if($portada["portada_temporal"] != ""){

				$validarPortada = \Validator::make($portada, [

					"portada_temporal" => 'required|image|mimes:jpg,jpeg,png|max:2000000'

				]);

				if($validarPortada->fails()){

					return redirect("")->with("no-validacion-imagen", "");
				}

			}

			//Validar imágenes icono
			if($icono["icono_temporal"] != ""){

				$validarIcono = \Validator::make($icono, [

					"icono_temporal" => 'required|image|mimes:jpg,jpeg,png|max:2000000'

				]);

				if($validarIcono->fails()){

					return redirect("")->with("no-validacion-imagen", "");
				}

			}

			//Revisar la validación
			if($validar->fails()){

				return redirect("/")->with("no-validacion", "");

			}else{

				//Subir al servidor la imagen Logo
				if($logo["logo_temporal"] != ""){

					unlink($datos["logo_actual"]);

					$aleatorio = mt_rand(100, 999);

					$rutaLogo = "img/plantilla".$aleatorio.".".$logo["logo_temporal"]->guessExtension();

					// move_uploaded_file($logo["logo_temporal"], $rutalogo);

					// redimensionar Imagen

					list($ancho, $alto) = getimagesize($logo["logo_temporal"]);

					$nuevoAncho = 205;
					$nuevoAlto = 75;

					if($logo["logo_temporal"]->guessExtension() == "jpeg"){

						$origen = imagecreatefromjpeg($logo["logo_temporal"]);
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $rutaLogo);
 
					}

					if($logo["logo_temporal"]->guessExtension() == "png"){

						$origen = imagecreatefrompng($logo["logo_temporal"]);
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagealphablending($destino, FALSE);
						imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $rutaLogo);

					}

				}else{

					$rutaLogo = $datos["logo_actual"];

				}

				//Subir al servidor la imagen Portada
				if($portada["portada_temporal"] != ""){

					unlink($datos["portada_actual"]);

					$aleatorio = mt_rand(100, 999);

					$rutaPortada = "img/plantilla/".$aleatorio.".".$portada["portada_temporal"]->guessExtension();

					// move_uploaded_file($portada["portada_temporal"], $rutaPortada);

					list($ancho, $alto) = getimagesize($portada["portada_temporal"]);

					$nuevoAncho = 700;
					$nuevoAlto = 200;

					if($portada["portada_temporal"]->guessExtension() == "jpeg"){

						$origen = imagecreatefromjpeg($portada["portada_temporal"]);
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $rutaPortada);
 
					}

					if($portada["portada_temporal"]->guessExtension() == "png"){

						$origen = imagecreatefrompng($portada["portada_temporal"]);
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagealphablending($destino, FALSE);
						imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $rutaPortada);

					}

				}else{

					$rutaPortada = $datos["portada_actual"];

				}

				//Subir al servidor la imagen Icono
				if($icono["icono_temporal"] != ""){

					unlink($datos["icono_actual"]);

					$aleatorio = mt_rand(100, 999);

					$rutaIcono = "img/plantilla".aleatorio.".".$icono["icono_temporal"]->guessExtension();

					// move_uploaded_file($icono["icono_temporal"], $rutaIcono);

					list($ancho, $alto) = getimagesize($icono["icono_temporal"]);

					$nuevoAncho = 150;
					$nuevoAlto = 150;

					if($icono["icono_temporal"]->guessExtension() == "jpeg"){

						$origen = imagecreatefromjpeg($icono["icono_temporal"]);
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $rutaIcono);
 
					}

					if($icono["icono_temporal"]->guessExtension() == "png"){

						$origen = imagecreatefrompng($icono["icono_temporal"]);
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagealphablending($destino, FALSE);
						imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $rutaIcono);

					}

				}else{

					$rutaIcono = $datos["icono_actual"];

				}

				//Guarda Información en BD
				$actualizar = array("dominio" => $datos["dominio"],
									"servidor" => $datos["servidor"],
									"titulo" => $datos["titulo"],
									"descripcion" => $datos["descripcion"],
									"palabras_claves" => json_encode(explode(",", $datos["palabras_claves"])),
									"redesSociales" => $datos["redesSociales"],
									"portada"=>$rutaPortada,
									"logo"=>$rutaLogo,
									"icono"=>$rutaIcono,
									"barraSuperior"=>$datos["barraSuperior"],
									"textoSuperior"=>$datos["textoSuperior"],
									"colorFondo"=>$datos["colorFondo"],
									"colorTexto"=>$datos["colorTexto"],
									"apiFacebook"=>$datos["apiFacebook"],
									"pixelFacebook"=>$datos["pixelFacebook"],
									"googleAnalytics"=>$datos["googleAnalytics"]
								);

				$plantilla = Plantilla::where("id", $id)->update($actualizar);

				return redirect("/")->with("ok-editar", "");

			}

		}else{

			return redirect("/")->with("error", "");
		}

	}	

}
