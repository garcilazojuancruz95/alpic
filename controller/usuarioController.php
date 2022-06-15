<?php 

	class UsuarioController
	{
		public $pages = "";
		public function login()
		{
			//LIMPIAR datos.
			$email = htmlentities($_POST["email"],ENT_COMPAT,"UTF-8");
			$password = htmlentities($_POST["password"],ENT_COMPAT,"UTF-8");

			$array = ["email"=>$email,"password"=>$password];
			
			$respuesta = UsuarioModel::login($array);
			//Respuesta es true , osea trajo una fila
			if ($respuesta) {
				$_SESSION['id'] = $respuesta["id"];
				$_SESSION['email'] = $respuesta["email"];
				$_SESSION['es_admin'] = $respuesta["es_admin"];
				$_SESSION['domicilio'] = $respuesta["domicilio"];
				$_SESSION['imagen'] = $respuesta["imagen"];
				$_SESSION['telefono'] = $respuesta["telefono"];
				$_SESSION['nombre_completo'] = $respuesta["nombre_completo"];
				header("location:/home");
			}
			//ERROR de SQL, ver el prepare()
			else{
				header("location:/login");
			}
		}
		public function cambiarImagen()
		{
			$allowedType = ["jpg","png","jpeg"];
			$target_file = basename($_FILES['imagen']["name"]);
			$maxSize = 50000000;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			
			$check = getimagesize($_FILES["imagen"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["imagen"]["size"] > $maxSize) {
				$uploadOk = 0;
			}
			// Allow certain file formats
			if(!in_array($imageFileType, $allowedType)) {
				$uploadOk = 0;
			}
			if ($uploadOk == 1) {
				$imagen = base64_encode(file_get_contents($_FILES["imagen"]["tmp_name"])); 
				$array = ["id"=>$_SESSION['id'],"imagen"=>$imagen];
				$respuesta = usuarioModel::cambiarImagen($array);
				if ($respuesta == true) {
					$_SESSION['imagen'] = $imagen;
					header("location:/perfil/img_success");
				}
				else{
					header("location:/perfil/img_error");
				}
			}
		}
		public function editarPerfil()
		{
			$id = htmlentities($_POST["id"],ENT_COMPAT,"UTF-8");
			$email = htmlentities($_POST["email"],ENT_COMPAT,"UTF-8");
			$nombre_completo = htmlentities($_POST["nombre_completo"],ENT_COMPAT,"UTF-8");
			$telefono = htmlentities($_POST["telefono"],ENT_COMPAT,"UTF-8");
			$domicilio = htmlentities($_POST["domicilio"],ENT_COMPAT,"UTF-8");
			
			$array = ["id"=>$id,"email"=>$email,"nombre_completo"=>$nombre_completo,"telefono"=>$telefono,"domicilio"=>$domicilio];
			$respuesta = usuarioModel::editarPerfil($array);
			if ($respuesta) {
				header("location:/perfil/perfil_success");
			}else{
				header("location:/editar_perfil/error");
			}
		}
		public function registro()
		{
			$email = htmlentities($_POST["email"],ENT_COMPAT,"UTF-8");
			$password = htmlentities($_POST["password"],ENT_COMPAT,"UTF-8");
			$password2 = htmlentities($_POST["password2"],ENT_COMPAT,"UTF-8");
			$nombre_completo = htmlentities($_POST["nombre_completo"],ENT_COMPAT,"UTF-8");

			$error = "";// _pass_nombre

			if ($password != $password2) {
				$error .= "_pass";
			}
			if (strlen($nombre_completo) < 7) {
				$error .= "_nombre";
			}
			if (strlen($email) < 6) {
				$error .= "_email";
			}
			//Ningun error de validacion
			if ($error == "") {
				$array = ["email"=>$email,"password"=>$password,"nombre_completo"=>$nombre_completo];
				$respuesta = UsuarioModel::registro($array);
				//Se registro el usuario
				if ($respuesta == true) {
					header("location:/login/_registro-exito"); 
				}
				//Sucedio un error de sintaxis en el modelo o la base de dato es diferente a la sentencia.
				else{
					header("location:/registro/error_db"); 
				}
			}
			//Problema en la validacion ,error NO es igual a ""
			else{
				header("location:/registro/".$error); 
			}
		}
	}
	
 ?>

 