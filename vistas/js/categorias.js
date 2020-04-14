/*=============================================
IDENTIFICAR LA PANTALLA
=============================================*/

if(window.matchMedia("(min-width:1200px)").matches){

	$(document).on("mouseover", ".listaCategorias li", function(){

		var enlace = $(this).attr("idCategoria");
		
		verSubcategorias(enlace);
		
	})

}else{

	$(document).on("click", ".listaCategorias li", function(){

		var enlace = $(this).attr("idCategoria");
		
		verSubcategorias(enlace);
		
	})

}

/*=============================================
CAMBIOS EN LA VENTANA MODAL DE CATEGORÍAS
=============================================*/

function verSubcategorias(enlace){

	/*=============================================
	CAMBIOS EN SUBCATEGORIAS
	=============================================*/

	var datosSubcategorias = new FormData();
	datosSubcategorias.append("idCategoria", enlace);
	datosSubcategorias.append("item", "id_categoria");
	datosSubcategorias.append("tabla", "subcategorias");

	$.ajax({

		url: "ajax/categorias.ajax.php",
		method:"POST",
		data: datosSubcategorias,
		cache: false,
		contentType: false,
		processData:false,
		dataType: "json",
		success: function(respuesta){

			/*=============================================
			CAMBIOS SÓLO EN MÓVIL VERTICAL
			=============================================*/

			if(window.matchMedia("(max-width:575px)").matches){	

				$(".listaCategorias").hide();

				$(".listaSubcategorias").parent().removeClass("d-none");

				$(".listaSubcategorias").parent().show();

				$(".listaSubcategorias").parent().append(

					'<button class="btn btn-default btn-sm regresarCategorias">Regresar</button>'

				)

				$(".regresarCategorias").click(function(){

					$(this).remove();

					$(".listaCategorias").show();
					$(".listaSubcategorias").parent().hide();

				})

			}

			$(".listaSubcategorias").html("");
			
			for(var i = 0; i < respuesta.length; i++){

				$(".listaSubcategorias").append(

					'<a href="'+respuesta[i]["ruta"]+'" class="text-secondary">'+
						'<li class="my-2">'+respuesta[i]["subcategoria"]+'</li>'+	
					 '</a>'
				)
			
			}

		}

	})

	/*=============================================
	CAMBIOS EN CATEGORIAS
	=============================================*/

	var datosCategorias = new FormData();
	datosCategorias.append("idCategoria", enlace);
	datosCategorias.append("item", "id");
	datosCategorias.append("tabla", "categorias");

	$.ajax({

		url: "ajax/categorias.ajax.php",
		method:"POST",
		data: datosCategorias,
		cache: false,
		contentType: false,
		processData:false,
		dataType: "json",
		success: function(respuesta){	
			
			$(".tituloCategoria").html(respuesta[0]["categoria"]);
			$(".desCategoria").html(respuesta[0]["descripcion"]);
			$(".imgCategoria").attr("src", respuesta[0]["imgOferta"]);
			$(".verProductos").attr("href", respuesta[0]["ruta"]);

		}

	})

}


