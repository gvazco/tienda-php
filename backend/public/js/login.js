/*===========================================
Función para crear Cookies en JS
===========================================*/
function crearCookie(nombre, valor, diasExpiracion){

	var hoy = new Date();

	hoy.setTime(hoy.getTime() + (diasExpiracion*24*60*60*1000));

	var fechaExpiracion = "expires=" +hoy.toUTCString();

	document.cookie = nombre + "=" +valor+"; "+fechaExpiracion;

}


/*===========================================
Capturar Email Login y convertirlo en Cookie
===========================================*/
$(document).on("change", ".email_login", function(){

	crearCookie("email_login", $(this).val(), 1);

})