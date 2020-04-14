/*=========================================
=            SELLECCIONAR PAIS            =
=========================================*/

$.ajax({

	url:"js/countries.json",
	type: "GET",
	cache: false,
	contentType: false,
	processData: false,
	dataType: "json",
	success: function(respuesta){
		// console.log("respuesta", respuesta);

		respuesta.forEach(seleccionarPais);

		function seleccionarPais(item, index) {

			var pais = item.name;
			var codPais = item.code;


			if($("#paisSeleccionado").val() == codPais) {

				$("#seleccionarPais").attr("value", codPais);
				$("#seleccionarPais").html(pais);

			}	


			$("#seleccionarPais").append(`

				<option value="`+codPais+`">`+pais+`</option>`

				);
			
		}

	}

})


/*===========================================
=            CAMBIAR INFORMACIÓN            =
===========================================*/

$(document).on("click", "#seleccionarPais", function(){


	var vistaPais = $("#seleccionarPais").val();


	$("#paisSeleccionado").val(vistaPais)

	
})


/*===========================================
=            CAMBIAR MODO PAYPAL            =
===========================================*/

$("input[name='modoPaypal']").on("ifChecked", function(){

	var modoPaypal = $(this).val();
	var modoMercado = $("input[name='modoPaypal']:checked").val();

	cambiarInformacion(modoPaypal, modoMercado);

})


/*===========================================
=            CAMIAR MODO MERCADO            =
===========================================*/
$("input[name='modoMercado']").on("ifChecked", function(){

	var modoMercado = $(this).val();
	var modopaypal = $("input[name='modoPaypal']:checked").val();

	cambiarInformacion(modoPaypal, modoMercado);

})


/*==============================================
=            GUARDAR LA INFORMACIÓN            =
==============================================*/

$(".cambioInformacion").change(function(){


	modoPaypal = $("input[name='modoPaypal']:checked").val();
	console.log("modoPaypal", modoPaypal);

	modoMercado = $("input[name='modoMercado']:checked").val();
	console.log("modoMercado", modoMercado);


})










