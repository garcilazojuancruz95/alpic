<?php 
class CategoriaController
{
	public function setCategoria($tipo)
	{

		$categoria = $_POST["categoria"];
		$array = ["categoria"=>$categoria];
		if ($tipo == "editar") {
			$array["id"] = $_POST["id"];
			$respuesta = CategoriaModel::editarCategoria($array);
			if ($respuesta) {
				 header("location:/listaCategorias/exito_editar");
			}
			else{
				 header("location:/editarCategoria/errorDB");
			}
		}
		else if($tipo == "crear") {
			$respuesta = CategoriaModel::crearCategoria($array);
			if ($respuesta) {
				 header("location:/listaCategorias/exito_crear");
			}
			else{
				 header("location:/crearCategoria/errorDB");
			}
		}
	}
}
 ?>