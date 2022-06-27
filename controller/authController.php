<?php 

	class AuthController
	{
		public function login()
		{
			$username = $_POST["username"];
			$password = $_POST["password"];

			$array = ["username" => $username, "password" => $password];

			$respuesta = AuthModel::login($array);
			//Si true, coincidio username y password. LOGEADO.
			if ($respuesta) {
				//Este metodo de PHP , arranca las variables session que son para guardar informacion de login y cuentas de cada usuario.
				//Las variables de session son globales como POST y GET pero existen en todo momento en todas la paginas, SIEMPRE hasta que mueren , generalmente 30 dias , despues de logearse
				session_start();
				$_SESSION['username'] = $respuesta["username"];
				header("location:/index");
			}
			//Si es distinto a mayor a 0, osea es IGUAL a 0 , no trajo nada fallo el login.
			else{
				header("location:/login/error");
			}

		}
		public function cerrar_session(){

		}
	}
 ?>