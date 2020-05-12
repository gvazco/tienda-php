/*=============================================
DataTable Servidor de administradores
=============================================*/

// $.ajax({

// 	url: ruta+"/categorias",
// 	success: function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	},
// 	error: function (jqXHR, textStatus, errorThrown) {
// 		console.error(textStatus + " " + errorThrown);
// 	}

// })

/*=============================================
DataTable de administradores
=============================================*/

var tablaCategorias = $("#tablaCategorias").DataTable({
	
	processing: true,
	serverSide: true,

	ajax:{
		url: ruta+"/categorias"		
	},

	"columnDefs":[{
		"searchable": true,
		"orderable": true,
		"targets": 0
	}],

	"order":[[0, "desc"]],

	columns: [
	{
		data: 'id',
		name: 'id'
	},
	{
		data: 'titulo',
		name: 'titulo'
	},
	{
		data: 'ruta',
		name: 'ruta'
	},
	{
		data: 'descripcion',
		name: 'descripcion'
	}, 
	{
		data: 'p_claves_categoria',
		name: 'p_claves_categoria',
	},
	{
		data: 'icono',
		name: 'icono',
		render: function(data, type, full, meta){

			return '<img src="'+ruta+'/'+data+'" class="img-fluid">'
		},

		orderable: false
	},
	{
		data: 'estado',
		name: 'estado'
	},
	{
		data: 'oferta',
		name: 'oferta'
	},
	{
		data: 'precioOferta',
		name: 'precioOferta'
	},
	{
		data: 'descuentoOferta',
		name: 'descuentoOferta'
	},
	{
		data: 'imgOferta',
		name: 'imgOferta',
		render: function(data, type, full, meta){

			return '<img src="'+ruta+'/'+data+'" class="img-fluid">'
		},
		orderable: false
	},
	{
		data: 'imgBanner',
		name: 'imgBanner',
		render: function(data, type, full, meta){

			return '<img src="'+ruta+'/'+data+'" class="img-fluid">'
		},
		orderable: false
	},

	{
		data:'finOferta',
		name:'finOferta'
	},

	{
		data:'acciones',
		name:'acciones'
	},
	

	],
	"language": {

		"sProcessing": "Procesando...",
		"sLengthMenu": "Mostrar _MENU_ registros",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Ningún dato disponible en esta tabla",
		"sInfo": "Mostrando registros del _START_ al _END_",
		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix": "",
		"sSearch": "Buscar:",
		"sUrl": "",
		"sInfoThousands": ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}

});

tablaCategorias.on('order.dt search.dt', function(){

	tablaCategorias.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i){ cell.innerHTML = i+1})

}).draw();