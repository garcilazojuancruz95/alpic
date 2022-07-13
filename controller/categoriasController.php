<?php 
class CategoriaController
{
	public function setCategoria($tipo)
	{
		var_dump($_POST);
		$nameCategoria = $_POST["nameCategoria"];
		$array = ["nameCategoria"=>$nameCategoria];
		if ($tipo == "editar") {
			$array["id"] = $_POST["id"];
			$respuesta = CategoriaModel::editarCategoria($array);
			if ($respuesta) {
				/* header("location:/listaProductos/exito_editar"); */
			}
			else{
				/* header("location:/editarProducto/errorDB"); */
			}
		}
		else if($tipo == "crear") {
			$respuesta = CategoriaModel::crearCategoria($array);
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