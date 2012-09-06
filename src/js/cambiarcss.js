function cambiacss(hoja){
	//Cambia la hoja de estilo
	if (hojaactiva()) {
		document.getElementById("hojaestilo").setAttribute("href",hoja);
	}
}
function guardarhoja(hoja) {
	//Guarda la hoja con WebStorage
	window.localStorage.setItem('hojacss',hoja);
}
function conseguirhoja() {
	//Obtiene la hoja de estilo guardada en WebStorage
	return window.localStorage.getItem('hojacss');
}
function cambiaryguardarhoja(hoja) {
	guardarhoja(hoja);
	cambiacss(conseguirhoja());
}
function activarhoja() {
	window.localStorage.setItem('activo','yes');
}
function desactivarhoja() {
	window.localStorage.setItem('activo','no');
}
function hojaactiva() {
	var activo = window.localStorage.getItem('activo');
	if (activo == 'yes') {
		return true;
	}
	else {
		return false;
	}
}
//~ window.onload = cambiacss('src/css/style.css');
window.onload = cambiacss(conseguirhoja());

