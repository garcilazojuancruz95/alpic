<?php 
require_once("conexion/conexion.php");

	class AuthModel
	{
		public static function login($array)
		{
			$sql = Conexion::conectar()->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");
			$sql->bindParam(":username",$array["username"],PDO::PARAM_STR);
			$sql->bindParam(":password",$array["password"],PDO::PARAM_STR);

			if ($sql->execute()) {
				//->fetch es un metodo de PDO, sirve para traer del SELECT la primera fila que encontro en forma de array.
				//
				//MYSQL tabla: admin (1 sola fila)
				//------------------------------------
				//columnas | id |   name   | password
				//------------------------------------
				//			 1    juancruz    123asd
				//
				//PHP PDO 
				//SE CONVIERTE en un array cuando usamos ->fetch()
				//
				//
				//array("id"=> 1,"name"=> "juancruz","password"=>"123asd");
				//
				//Acceder a un id 
				//
				//$array["id"]
				//
				$respuesta =  $sql->fetch();
			}else{
				$respuesta = false;
			}
			return $respuesta;
		}
	}
 ?>