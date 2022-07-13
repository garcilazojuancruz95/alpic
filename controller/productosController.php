<?php 
/*
1.Copiar el crearCliente.views al crearProductos.views
2.Cambiar los label, input, php de abajo de todo para que funcione para un producto sino funcionaria como crearCliente
3.Tambien borrar si es necesario inputs , porque la vista de uno y de otro no tendran la misma cantidad de datos.
4.Luego ir al navegador y enviar el formulario y ver si llega los datos que tienen que llegar (var_dump mostrara el $_POST osea lo que viene del form)
5.crear modelo para productos
6. volver a enviar el formulario en el navegador y ver si guarda en la base de dato.
*/
class ProductosController
{
	public function setProducto($tipo)
	{
		var_dump($_POST);
		$nameProd = $_POST["name"];
		$tipo = $_POST["tipo"];
		$tipoProducto = $_POST["tipoProducto"];
		$array = ["nameProd"=>$nameProd,"tipo"=>$tipo,];
		if ($tipo == "editar") {
			$array["id"] = $_POST["id"];
			$respuesta = ProductosModel::editarProducto($array);
			if ($respuesta) {
				/* header("location:/listaProductos/exito_editar"); */
			}
			else{
				/* header("location:/editarProducto/errorDB"); */
			}
		}
		else if($tipo == "crear") {
			$respuesta = ProductosModel::crearProducto($array);
			if ($respuesta) {
				/* header("location:/listaProductos/exito_crear"); */
			}
			else{
				/* header("location:/crearProducto/errorDB"); */
			}
		}
	}
}
 ?>
