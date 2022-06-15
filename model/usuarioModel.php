<?php 
	require_once("conexion/conexion.php");
	class UsuarioModel
	{
		public static function login($array){

			//el metodo prepare es de pdo. Prepara la sentencia SQL
			$sql = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE email = :email AND password = :password");
			$sql->bindParam(":email",$array["email"],PDO::PARAM_STR);
			$sql->bindParam(":password",$array["password"],PDO::PARAM_STR);
			//PARAM_STR -> decirle a pdo que este parametro es un string o caracter.
			//PARAM_INT -> decirle a pdo que este parametro es un numero.
			
			//el metodo execute es de PDO y devuelve true o false, TRUE si se ejecuto bien FALSE si hubo un error en la sentecia.
			
			if ($sql->execute()) {
				//Si se ejecuta bien el execute, puede que halla 1 fila o nada.
				$respuesta = $sql->fetch();
			}else{
				//Si pasa por aca tenemos un error en la sentencia, NO que devuelve vacio , ERROR en el prepare()
				$respuesta = false;
			}
			return $respuesta;
		}
		public static function registro($array){
			$sql = Conexion::conectar()->prepare("INSERT INTO usuarios (email,password,nombre_completo) VALUES(:email,:password,:nombre_completo)");
			$sql->bindParam(":email",$array["email"],PDO::PARAM_STR);
			$sql->bindParam(":password",$array["password"],PDO::PARAM_STR);
			$sql->bindParam(":nombre_completo",$array["nombre_completo"],PDO::PARAM_STR);

			if ($sql->execute()) {
				$respuesta = true;
			}
			else{
				$respuesta = false;
			}
			return $respuesta;
		}
		public static function cambiarImagen($array){
			$sql = Conexion::conectar()->prepare("UPDATE usuarios SET  usuarios.imagen = :imagen WHERE usuarios.id = :id");
			$sql->bindParam(":id",$array["id"],PDO::PARAM_INT);
			$sql->bindParam(":imagen",$array["imagen"],PDO::PARAM_STR);
			if ($sql->execute()) {
				$respuesta = true;
			}
			else{
				$respuesta = false;
			}
			return $respuesta;
		}
		public static function editarPerfil($array){
			$sql = Conexion::conectar()->prepare("UPDATE usuarios SET email = :email, nombre_completo = :nombre_completo, domicilio = :domicilio, telefono = :telefono WHERE id = :id");
			$sql->bindParam(":email",$array["email"],PDO::PARAM_STR);
			$sql->bindParam(":telefono",$array["telefono"],PDO::PARAM_STR);
			$sql->bindParam(":domicilio",$array["domicilio"],PDO::PARAM_STR);
			$sql->bindParam(":id",$array["id"],PDO::PARAM_INT);
			$sql->bindParam(":nombre_completo",$array["nombre_completo"],PDO::PARAM_STR);

			if ($sql->execute()) {
				$respuesta = true;
			}
			else{
				$respuesta = false;
			}
			return $respuesta;
		}

		public static function eliminarCuenta($array){
			$sql = Conexion::conectar()->prepare("DELETE FROM usuarios WHERE id = :id");
			$sql->bindParam(":id",$array["id"],PDO::PARAM_INT);

			if ($sql->execute()) {
				$respuesta = true;
			}
			else{
				$respuesta = false;
			}
			return $respuesta;
		}
	}
?>