<?php 
	//RouteController debe manejar las diferentes paginas que va a ver el usuario.
	class RouteController
	{
		public static function enlace()
		{
			$nombre = "emanuel";
			$arrayPages = ["crearCliente","index","listaClientes","login","editarCliente"];
			//si existe action
			if (isset($_GET["action"])) {

				if (in_array($_GET["action"], $arrayPages) == true) {
					$page = $_GET["action"].".views.php";
				}
				else{
					$page = "error404.views.php";
				}
			}
			//No existe el action
			else{
				$page = "index.views.php";
			}

			require_once("views/modules/pages/".$page);
		}
		public static function limpiar(){

		}
	}
?>

