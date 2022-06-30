<?php 
//Logica,validacion,procesos y envios a vista o modelo
class ClientesController
{
	//Metodo NO-statico 
	public function setCliente($tipo)//$tipo == crear o $tipo == editar
	{

		$name = $_POST["name"];
		$email = $_POST["email"];
		$address = $_POST["address"];
		$phone = $_POST["phone"];
		$birthDate = $_POST["birthDate"];
		$dni = $_POST["dni"];
		//Array por llave es distinto al comun array por indice, debido a que reemplazamos los 0,1,2,3 por texto name,email,phone
		//Ingresamos a sus valores igual
		//$array["name"] en vez de $array[0]
		$array = ["name"=>$name,"email"=>$email,"address"=>$address,"phone"=>$phone,"birthDate"=>$birthDate,"dni"=>$dni];
		
		if ($tipo == "editar") {
			$array["id"] = $_POST["id"];//asignar nuevo indice
			$respuesta = ClientesModel::editarCliente($array);
			if ($respuesta) {
				header("location:/listaClientes/exito_editar");
			}
			else{
				header("location:/editarCliente//errorDB");
			}
		}
		//Si $respuesta tiene true significa que se guardo el usuario, false surgio un error.
		else if($tipo == "crear") {
			$respuesta = ClientesModel::crearCliente($array);
			if ($respuesta) {
				header("location:/listaClientes/exito_crear");
			}
			else{
				header("location:/crearCliente/errorDB");
			}
		}
	}
	public function listaUsuario()
	{
		
	}
	public function borrarUsuario()
	{
		
	}
}
 ?>
