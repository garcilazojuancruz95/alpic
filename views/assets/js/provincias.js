function ajaxProvincias(element){//PASO#2

	//Esta variable guarda la opcion seleccionada,y el select se pasa por parametros variable element. La linea de arriba.
	let provinciaSelecion = element.options[element.selectedIndex].value;
	//element.options -> coleccion de etiquetas option
	//element.selectedIndex -> el indice de la opcion seleccionada (0, 1, 2, 3, 4, 5)
	//Juntos -> element.options[element.selectedIndex] traen la option que cambiamos.
	//y .value se usa para dar con el valor interno del dicho option.

	//Usamos ajax para enviarle a PHP un dato de JS, y que PHP realice la logica mientras Javascript espera una respuesta
	
	// ajaxProvincias(JS) -> ajax.php(PHP) -> ajaxProvincias(JS)success -> VISTA la lista de localidades actualizada.
	
	//Preparamos el envio de un ajax, es parecido al envio de una consulta sql.
	//type -> con que tipo de variable global $_POST $_GET
	//dataType -> el JS en el success va a recibir como json
	//URL -> a que codigo PHP envia
	//data -> los datos o variables JS que le queremos enviar a PHP
	$.ajax({
		"type":"get",
		"dataType":"json",
		"data":{provincia:provinciaSelecion},
		"url":"controller/ajax.php",//PASO#3
		success:function(){//PASO#4
			
		}
	});
}