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
}
/*ESTUDIAR pdo y de pdo (->execute(), ->prepare() , ->bindParam() */
?>

