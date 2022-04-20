function switch_color() {
	//Cambia el bacgkround de la caja
	document.getElementById('display_color').style.background = document.getElementById('color_switch').value;
	//Cambia el código hexadecimal que se muestra
	document.getElementById('hex_code').innerHTML = "HEX CODE: <code>" + document.getElementById('color_switch').value + "</code>";
}