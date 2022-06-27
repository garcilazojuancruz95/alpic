<?php 
//MODELO consultas para base de dato
require_once("conexion/conexion.php");
class ClientesModel
{
	/*
	Un metodo static, significa que se puede llamar a este metodo SIN INSTANCIAR LA CLASE.

	--NO-- 
	$a = new UsuariosModel; 
	$a->crearUsuario();
	--SI--
	UsuariosModel::crearUsuario
	 */
	public static function crearCliente($array)
	{
		//El metodo prepare() proviene de PDO, que es el sistema de conexion a Base de dato.
		//Este metodo esta adentro de contar ,por eso sale una flecha de conectar hacia prepare().
		
		$sql = Conexion::conectar()->prepare("INSERT INTO clientes (email,name,dni,phone,birthDate,address) VALUES(:email,:name,:dni,:phone,:birthDate,:address)");
		/*
		Es un metodo de PDO, que usamos para vincular lo que viene 
		por $array['email'] y convertirlo a :email.
		Porque?
		Porque PDO , el sistema de conexion a DB requiere cambiar las variables a este formato :email, por una cuestion de seguridad.
		*/
	
		$sql->bindParam(":email",$array["email"],PDO::PARAM_STR);//Un string o fecha
		$sql->bindParam(":name",$array["name"],PDO::PARAM_STR);
		$sql->bindParam(":dni",$array["dni"],PDO::PARAM_INT);//Un numero
		$sql->bindParam(":phone",$array["phone"],PDO::PARAM_INT);
		$sql->bindParam(":birthDate",$array["birthDate"],PDO::PARAM_STR);
		$sql->bindParam(":address",$array["address"],PDO::PARAM_STR);

		// usando la variable $sql que sostiene la conexion y la sentencia
		// Usamos el metodo ->execute() que proviene de PDO, que sirve para ejecutar la sentencia.
		// 
		// Ejecuta la sentencia devuelve true si funciono y false si hay error de DB
		if( $sql->execute() ){
			return true;
		}
		// Hay un error de DB, esta mal el prepare o falta un bindParam o la base de dato es distinto a la sentencia del prepare.
		else{
			return false;
		}
	}
	public static function getClienteById($array){
		$sql = Conexion::conectar()->prepare("SELECT * FROM clientes WHERE id = :id ORDER BY id DESC");
		$sql->bindParam(":id",$array["id"],PDO::PARAM_INT);

		if( $sql->execute()){
			$respuesta = $sql->fetch();
		}
		else{
			$respuesta = 0;
		}
		return $respuesta;
	}
	public static function listaCliente(){
		$sql = Conexion::conectar()->prepare("SELECT * FROM clientes ORDER BY id DESC");
		if( $sql->execute()){
			$respuesta = $sql->fetchAll();
		}
		else{
			$respuesta = 0;
		}
		return $respuesta;
	}
	public static function eliminarCliente($array){
		$sql = Conexion::conectar()->prepare("DELETE FROM clientes WHERE id = :id");
		$sql->bindParam(":id",$array["id"],PDO::PARAM_INT);

		if( $sql->execute()){
			$respuesta = true;
		}
		else{
			$respuesta = false;
		}
		return $respuesta;
	}
}
/*ESTUDIAR pdo y de pdo (->execute(), ->prepare() , ->bindParam() */



/*->fetchAll trae todas las filas del SELECT en forma de array multidimensional.
			Esto significa arrays de arrays.

			//MYSQL tabla: clientes (muchas filas)
				//------------------------------------
				//columnas | id |   name   | password
				//------------------------------------
				//			 1    juancruz    123asd
				//			 2    ema    	  123asd
				//			 3    martin      123asd
				//
				//PHP PDO 
				//SE CONVIERTE en un array cuando usamos ->fetch()
				//
				//
				//array(
				[0]array("id"=> 1,"name"=> "juancruz","password"=>"123asd"),
				[1]array("id"=> 2,"name"=> "ema","password"=>"123asd"),
				[2]array("id"=> 3,"name"=> "martin","password"=>"123asd"),
				);
				//
				acceder a un id de un cliente
				$array[1]["id"]
				//


			*/


?>


