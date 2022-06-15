function precio_caja(element) {
	var opt = element.options[element.selectedIndex];
	if (opt.value == "grande") {
		document.querySelector("#envios-precio span").innerHTML = "$"+2000;
		console.log(document.querySelector("#envios-precio input"));
		document.querySelector("#envios-precio input").value = 2000;
	}
	else if (opt.value == "media") {
		document.querySelector("#envios-precio span").innerHTML = "$"+1000;
		document.querySelector("#envios-precio input").value = 1000;
	}
	else if (opt.value == "chico") {
		document.querySelector("#envios-precio span").innerHTML = "$"+500;
		document.querySelector("#envios-precio input").value = 500;
	}
}