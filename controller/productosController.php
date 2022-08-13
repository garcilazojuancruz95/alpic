<?php 
class ProductosController
{
	//funcion o metodo
	public function setProducto($tipo)
	{
		var_dump($_POST);
		$name = $_POST["name"];
		$idCategoria = $_POST["idCategoria"];
		$stock = $_POST["stock"];
		$array = ["name"=>$name,"idCategoria"=>$idCategoria,"stock"=>$stock];
		if ($tipo == "editar") {
			$array["id"] = $_POST["id"];
			$respuesta = ProductosModel::editarProducto($array);
			if ($respuesta) {
				header("location:/listaProductos/exito_editar");
			}
			else{
				header("location:/editarProducto/errorDB");
			}
		}
		else if($tipo == "crear") {
			$respuesta = ProductosModel::crearProducto($array);
			if ($respuesta) {
				header("location:/listaProductos/exito_crear");
			}
			else{
				header("location:/crearProducto/errorDB");
			}
		}
	}
}
 ?>
